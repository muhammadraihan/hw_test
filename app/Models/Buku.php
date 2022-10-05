<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Buku extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'judul', 'kategori', 'tgl_pinjam', 'tgl_kembali', 'status'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori', 'uuid');
    }
}
