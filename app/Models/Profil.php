<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profil'; // Nama tabel
    protected $primaryKey = 'id_profil'; // Primary key

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'alamat',
        'phoneNumber',
        'jobStatus',
        'kota',
        'profilpic',
    ];
}