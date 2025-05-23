<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadosen extends Model
{
    use HasFactory;

    protected $primaryKey = 'nidn';  // Menggunakan nidn sebagai primary key
    public $incrementing = false;    // Jika nidn bukan auto-increment
    protected $keyType = 'string';

    protected $table = 'dosen'; // Nama tabel di database
    public $timestamps = false;
    protected $fillable = ['nidn', 'nama_dosen'];
}
