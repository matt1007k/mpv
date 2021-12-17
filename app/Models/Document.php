<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'created_at',
    ];

    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function filePath()
    {
        return Storage::url($this->file);
    }

    public function fileName()
    {
        return explode('/', $this->file)[1];
    }

    public function hasResponse()
    {
        return $this->response()->count() > 0;
    }

    public function isProcessed()
    {
        return $this->status === 'processed';
    }

    public function scopeHasUser(Builder $query)
    {
        if (!auth()->user()->isAdmin()) {
            return $query->where('user_id', auth()->user()->id)
                ->orWhere('email', auth()->user()->email);
        }
        return $query;
    }
    public function scopeSearch(Builder $query, string $search)
    {
        return $query->where('full_name', 'LIKE', "%$search%")
            ->orWhere('doc_number', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('address', 'LIKE', "%$search%")
            ->orWhere('origin_place', 'LIKE', "%$search%")
            ->orWhere('subject', 'LIKE', "%$search%")
        ;
    }

    public function scopeRangeDate(Builder $query, string $dateFrom, string $dateTo)
    {
        if ($dateFrom != "" && $dateTo != "") {
            return $query->whereBetween('created_at', [$dateFrom, $dateTo]);
        }
    }

    public function response()
    {
        return $this->hasOne(\App\Models\Response::class);
    }
}
