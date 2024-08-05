<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $primaryKey = 'subject_id';
    protected $guarded = ['subject_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subject', 'subject_id', 'user_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'subject_id');
    }
}
