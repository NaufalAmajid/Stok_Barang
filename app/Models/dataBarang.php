<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataBarang extends Model
{

    protected $table = 'data_barang';
    protected $fillable = ['kode_barang', 'nama_barang', 'harga', 'stok'];

    use HasFactory;

}
