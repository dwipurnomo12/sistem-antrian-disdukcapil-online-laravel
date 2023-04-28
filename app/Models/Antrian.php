<?php

namespace App\Models;

use App\Models\User;
use App\Models\Layanan;
use App\Models\Ambilantrian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Antrian extends Model
{
    use HasFactory;
    Use Sluggable;
    
    // protected $guarded = ['id'];
    protected $fillable = ['nama_layanan', 'kode','deskripsi', 'slug', 'persyaratan', 'batas_antrian', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Ambilantrians()
    {
        return $this->hasMany(Ambilantrian::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_antrian'
            ]
        ];
    }

}
