<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    
    protected $table = 'layanan'; // Nama tabel
    protected $primaryKey = 'id'; // Kolom kunci utama
    public $incrementing = true; // ID incrementing secara otomatis
    public $timestamps = true; // Kolom timestamp

    protected $fillable = [
        'layanan', // Kolom 'layanan'
        'deskripsi', // Kolom 'deskripsi'
        'lama_waktu', // Kolom 'lama_waktu'
        'harga', // Kolom 'harga'
        'gambar' // Kolom 'gambar'
    ];
}
