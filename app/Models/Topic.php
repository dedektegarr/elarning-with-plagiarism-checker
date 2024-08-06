<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $primaryKey = 'topic_id';
    protected $guarded = ['topic_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class, 'topic_id');
    }
}
