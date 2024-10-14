<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'Kasir';
    protected $fillable =['nama','no_telp','alamat'];
}
