<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = 'target'; // Nama tabel
    protected $primaryKey = 'id_target'; // Primary key

    protected $fillable = [
        'total_finansial',
        'total_pengeluaran',
    ];
}