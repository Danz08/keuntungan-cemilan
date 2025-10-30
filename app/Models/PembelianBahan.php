<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBahan extends Model
{
    use HasFactory;

    protected $table = 'pembelian_bahan';
    protected $fillable = [
        'nama_bahan',
        'jumlah',
        'harga_satuan',
        'total',
        'tanggal_pembelian',
    ];
}
