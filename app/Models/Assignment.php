<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'assignment_id';
    protected $guarded = ['assignment_id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function metadata()
    {
        return $this->hasOne(Metadata::class, 'assignment_id');
    }
}
