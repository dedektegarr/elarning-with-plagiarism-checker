<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimilarityResult extends Model
{
    use HasFactory;

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }

    public function comparedSubmission()
    {
        return $this->belongsTo(Submission::class, 'compared_submission_id');
    }
}
