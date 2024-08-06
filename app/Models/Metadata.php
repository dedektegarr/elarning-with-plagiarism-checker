<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use HasFactory;

    protected $primaryKey = 'metadata_id';
    protected $guarded = ['metadata_id'];

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'metadata_id');
    }
}
