<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangKeluar extends Model
{

    protected $table = 'barang_keluars';
    protected $fillable = ['kode_barang', 'stok'];

    use HasFactory;
}
