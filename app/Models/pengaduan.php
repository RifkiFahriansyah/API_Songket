<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengaduan extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'no_telp', 'isi'];
}
