<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oddoOutModel extends Model
{
    use HasFactory;

    protected $table = "oddo_out";
    protected $primarykey = "id";
    protected $fillable = ['kendaraan_id','user_id','oddometer','foto_oddo_meter','safety_tools'];

    public function riwayatOddo()
    {
        return $this->hasOne(riwayatOddoModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(KendaraanModel::class, 'kendaraan_id');
    }

}
