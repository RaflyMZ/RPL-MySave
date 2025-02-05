<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finansial extends Model
{
    use HasFactory;

    protected $table = 'finansial'; // Nama tabel
    protected $primaryKey = 'id_finansial'; // Primary key

    protected $fillable = [
        'sumber',
        'tanggal_pemasukan',
        'penghasilan',
    ];
}