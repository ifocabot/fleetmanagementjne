<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanModel extends Model
{
    use HasFactory;

    protected $table = "kendaraan";

    protected $primarykey = "id";

    protected $fillable = ['nomor_polisi','foto_mobil','tipe_mobil','vendor'];


    public function oddoIns()
    {
        return $this->hasMany(oddoInModel::class, 'kendaraan_id');
    }

    public function oddoOuts()
    {
        return $this->hasMany(oddoOutModel::class, 'kendaraan_id');
    }


}
