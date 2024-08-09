<?php

namespace App\Helpers;

use Smalot\PdfParser\Parser;

class PDFService
{
    public function parseMetadata($path)
    {
        $parser = new Parser();
        $pdf = $parser->parseFile($path);

        return $pdf->getDetails();
    }

    public function uploadPdf($file)
    {
        $fileOutputPath = $file->store('public/documents');
        $filenameArr = explode('/', $fileOutputPath);
        $filename = 'documents/' . end($filenameArr);

        return $filename;
    }

    public function preprocessDocument($pathname)
    {
        $scriptPath = "../app/Python/Preprocess.py";
        $escaped = escapeshellarg($pathname);
        $command = escapeshellcmd("python $scriptPath $escaped");
        $output = shell_exec($command);

        return $output;
    }

    public function calculateSimilarity($word_tokens_path)
    {
        $scriptPath = "../app/Python/Calculate.py";
        $escapedWordTokensPath = escapeshellarg($word_tokens_path);
        $command = escapeshellcmd("python $scriptPath $escapedWordTokensPath");

        $output = shell_exec($command);
        return $output;
    }
}
