<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class songket extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['nama_songket', 'deskripsi', 'gambar'];
    
}
