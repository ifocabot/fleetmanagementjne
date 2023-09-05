<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayatOddoModel extends Model
{
    protected $table = "riwayat_oddo";
    protected $primarykey = "id";
    protected $fillable = ['user_id','oddo_in_id','oddo_out_id'];

    public function oddoIn()
    {
        return $this->belongsTo(oddoInModel::class);
    }

    public function oddoOut()
    {
        return $this->belongsTo(oddoOutModel::class);
    }
}
