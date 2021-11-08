<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->where('full_name', 'LIKE', "%$search%")
            ->orWhere('dni', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('address', 'LIKE', "%$search%")
            ->orWhere('origin_place', 'LIKE', "%$search%")
        ;
    }

    public function scopeRangeDate(Builder $query, string $dateFrom, string $dateTo)
    {
        if ($dateFrom != "" && $dateTo != "") {
            return $query->whereBetween('created_at', [$dateFrom, $dateTo]);
        }
    }
}
