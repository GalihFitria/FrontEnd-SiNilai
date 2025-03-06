<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahdosen extends Model
{
    use HasFactory;

    protected $table = 'tambahdosens';

    
    protected $fillable = ['nidn', 'nama_dosen'];
}
