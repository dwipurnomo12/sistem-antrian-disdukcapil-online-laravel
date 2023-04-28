<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ambilantrian;
use App\Models\User;
use App\Models\Antrian;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Antrian::create([
            'nama_layanan' => 'Layanan E-KTP',
            'kode'         => 'KTP',
            'slug'         => 'layanan-e-ktp',
            'batas_antrian'=> 20,
            'deskripsi'    => 'Ambil antrian untuk mengurus perekaman E-KTP',
            'persyaratan'  => 'Berkas yang dibawa Fotocopy KK, KTP-el asli yang lama, Surat keterangan hilang kepolisian', 
            'user_id'      => 1,
        ]);

        Antrian::create([
            'nama_layanan' => 'Layanan Kartu Keluarga',
            'kode'         => 'KK',
            'slug'         => 'layanan-kartu-keluarga',
            'batas_antrian'=> 20,
            'deskripsi'    => 'Ambil antrian untuk mengurus Kartu Keluarga',
            'persyaratan'  => 'Berkas yang dibawa Fotocopy KK', 
            'user_id'      => 1,
        ]);

        Antrian::create([
            'nama_layanan' => 'Layanan Akta Kelahiran',
            'kode'         => 'AKKEL',
            'slug'         => 'layanan-akta-kelahiran',
            'batas_antrian'=> 20,
            'deskripsi'    => 'Ambil antrian untuk mengurus Akta Kelahiran',
            'persyaratan'  => 'Berkas yang dibawa Fotocopy KK', 
            'user_id'      => 1,
        ]);

        Antrian::create([
            'nama_layanan' => 'Layanan Surat Pindah',
            'kode'         => 'SP',
            'slug'         => 'layanan-surat-pindah',
            'batas_antrian'=> 20,
            'deskripsi'    => 'Ambil antrian untuk mengurus Surat Pindah',
            'persyaratan'  => 'Berkas yang dibawa Fotocopy KK', 
            'user_id'      => 1,
        ]);

        Layanan::create([
            'nama_layanan' => 'Layanan E-KTP',
            'kode'         => 'KTP',
            'deskripsi'    => 'Pelayanan dan pengurusan E-KTP',
            'user_id'      => 1
        ]);

        Layanan::create([
            'nama_layanan' => 'Layanan Kartu Keluarga',
            'kode'         => 'KK',
            'deskripsi'    => 'Pelayanan dan pengurusan Kart Keluarga (KK)',
            'user_id'      => 1
        ]);

        Layanan::create([
            'nama_layanan' => 'Layanan Akta Kelahiran',
            'kode'         => 'AKKEL',
            'deskripsi'    => 'Pelayanan dan pengurusan Akta Kelahiran',
            'user_id'      => 1
        ]);

        Layanan::create([
            'nama_layanan' => 'Layanan Surat Pindah',
            'kode'         => 'KK',
            'deskripsi'    => 'Pelayanan dan pengurusan Surat Pindah',
            'user_id'      => 1
        ]);

        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 'admin'
        ]);


    }
}
