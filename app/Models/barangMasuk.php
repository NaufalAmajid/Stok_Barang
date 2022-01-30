<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangMasuk extends Model
{

    protected $table = 'barang_masuk';
    protected $fillable = ['kode_barang', 'kode_supplier', 'stok'];

    use HasFactory;
}
