<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use HasFactory;

    protected $primaryKey = 'metadata_id';
    protected $guarded = ['metadata_id'];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'metadata_id');
    }
}
