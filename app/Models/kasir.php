<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasir extends Model
{
    use HasFactory;
    protected $table = 'Kasir';
    protected $fillable =['nama','no_telp','alamat','tgl_lahir','tempat_lahir'];
}
