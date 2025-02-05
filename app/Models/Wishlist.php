<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist'; 

    protected $fillable = [
        'jumlah',
        'tanggal',
        'nama',
        'alasan',
    ];

    // Relasi ke tabel finansial
    public function finansial()
    {
        return $this->belongsTo(Finansial::class, 'id_finansial');
    }
}
