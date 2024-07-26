<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'province_id',
        'name',
        'county',
        'latitude',
        'longitude'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
