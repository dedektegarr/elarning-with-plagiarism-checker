<?php

namespace App\Livewire;

use App\Helpers\PDFService;
use App\Models\Metadata;
use Livewire\Component;

class SubmissionDetails extends Component
{
    public $submission;

    public function getDocumentText($submission)
    {
        $decoded = join(' ', json_decode($submission->metadata->word_tokens));
        return [$decoded];
    }

    public function getReferenceTexts($topicId)
    {
        $reference_metadata = Metadata::with('submission')->get()->filter(function ($metadata) use ($topicId) {
            return ($metadata->submission->topic_id === $topicId) && ($metadata->submission->submission_id !== $this->submission->submission_id);
        });

        $reference_texts = $reference_metadata->map(function ($ref_metadata) {
            $ref_metadata['word_tokens'] = join(' ', json_decode($ref_metadata->word_tokens));

            return $ref_metadata;
        })->toArray();

        return array_values($reference_texts);
    }

    public function createTemporaryFile($name, $content)
    {
        $file_path = storage_path('app/word-tokens-tmp/' . time() . '-' . $name);
        file_put_contents($file_path, $content);

        return $file_path;
    }

    public function saveSimilarityResults($submission_id, $reference_data, $cosim_results)
    {
        $data = [];

        $timestamp = now();

        foreach ($reference_data as $index => $reference) {
            $data[] = [
                'submission_id' => $submission_id,
                'compared_submission_id' => $reference['submission_id'],
                'cosim_result' => $cosim_results[$index],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }
        dd($data);
    }

    public function checkPlagiarism(PDFService $pdfService)
    {
        // Get document text and reference texts
        $document_text = $this->getDocumentText($this->submission);
        $reference_texts = $this->getReferenceTexts($this->submission->topic->topic_id);
        $merged_texts = array_merge($document_text, array_column($reference_texts, 'word_tokens'));

        // Create and get temporary word tokens path
        $temporaryPath = $this->createTemporaryFile('tokens.json', json_encode($merged_texts));

        // Calculate Cosine Similarity
        $cosim_results = json_decode($pdfService->calculateSimilarity($temporaryPath));
        // Remove the first index (self-comparison result)
        $cosim_results = array_slice($cosim_results, 1);

        $this->saveSimilarityResults($this->submission->submission_id, $reference_texts, $cosim_results);

        dd($cosim_results);
    }

    public function render()
    {
        return view('livewire.submission-details');
    }
}
