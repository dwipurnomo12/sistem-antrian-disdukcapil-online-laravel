<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Ambilantrian extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal', 'nama_lengkap', 'alamat', 'kode', 'nomorhp', 'antrian_id', 'batas_antrian', 'user_id', 'created_at'];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }
}
