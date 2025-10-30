<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk','kategori','harga_modal','harga_jual','stok','keterangan'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'produk_id');
    }
}
