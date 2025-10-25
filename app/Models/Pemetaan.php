<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemetaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jalan_diperbaiki',
        'panjang_jalan',
        'lebar_jalan',
        'pt',
        'data_pembangunan',
        'rt',
        'rw',
        'latitude',
        'longitude',
        'dokumen',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'panjang_jalan' => 'decimal:2',
        'lebar_jalan' => 'decimal:2',
    ];
}
