<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    // Tambahkan atribut yang bisa diisi secara massal
    protected $fillable = [
        'jumlah',
        'tanggal',
        'nama',
        'alasan',
    ];
}
