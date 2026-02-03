<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'date_achat'];

    protected $casts = [
        'date_achat' => 'date',
        'prix' => 'decimal:2'
    ];
}