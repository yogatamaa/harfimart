<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $fillable = ['desa','kecamatan','kabupaten','nomor_tlp'];
}
