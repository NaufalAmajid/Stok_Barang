<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class barangMasuk extends Model
{

    protected $table = 'barang_masuk';
    protected $fillable = ['kode_barang', 'kode_supplier', 'stok'];

    use HasFactory;

    public function getCreatedAtAtribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }
}
