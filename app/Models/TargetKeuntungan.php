<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetKeuntungan extends Model
{
    use HasFactory;
    protected $table = 'target_keuntungan';
    protected $fillable = [
        'periode','target_nominal','keuntungan_tercapai','persentase_pencapaian','status'
    ];
}
