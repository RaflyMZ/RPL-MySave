<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran'; // Nama tabel
    protected $primaryKey = 'id_pengeluaran'; // Primary key

    protected $fillable = [
        'tenggat_pengeluaran',
        'nama_pengeluaran',
        'nominal',
    ];
}