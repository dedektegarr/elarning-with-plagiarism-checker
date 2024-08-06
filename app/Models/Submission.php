<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $primaryKey = 'submission_id';
    protected $guarded = ['submission_id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function metadata()
    {
        return $this->hasOne(Metadata::class, 'submission_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
