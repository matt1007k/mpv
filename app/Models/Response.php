<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_number',
        'file_number',
        'type',
        'observation',
        'document_id',
    ];

    public function document()
    {
        return $this->belongsTo(\App\Models\Document::class);
    }
}
