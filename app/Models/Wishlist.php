<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist'; // Nama tabel
    protected $primaryKey = 'id_wishlist'; // Primary key

    protected $fillable = [
        'id_finansial',
        'nama_wishlist',
        'nominal_wishlist',
        'tanggal_wishlist',
        'alasan',
    ];

    // Relasi ke tabel finansial
    public function finansial()
    {
        return $this->belongsTo(Finansial::class, 'id_finansial');
    }
}