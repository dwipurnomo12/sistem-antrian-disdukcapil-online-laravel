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

        // Antrian::create([
        //     'nama_layanan' => 'Perekaman E-KTP',
        //     'kode'         => 'KTP',
        //     'slug'         => 'perekaman-e-ktp',
        //     'deskripsi'    => 'Ambil antrian untuk mengurus perekaman E-KTP anda',
        //     'persyaratan'  => 'Berkas yang dibawa Fotocopy KK, KTP-el asli yang lama, Surat keterangan hilang kepolisian', 
        //     'user_id'      => 1,
        // ]);

        // Antrian::create([
        //     'nama_layanan' => 'Kartu Keluarga',
        //     'kode'         => 'KK',
        //     'slug'         => 'kartu-keluarga',
        //     'deskripsi'    => 'Ambil antrian untuk mengurus Kartu Keluarga anda',
        //     'persyaratan'  => 'Berkas yang dibawa Fotocopy KK', 
        //     'user_id'      => 1,
        // ]);

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

        User::create([
            'name'      => 'Dwi Purnomo',
            'email'     => 'purnomodwi174@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 'admin'
        ]);

        User::create([
            'name'      => 'Mujiyono',
            'email'     => 'mujiyono@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 'masyarakat'
        ]);

        User::create([
            'name'      => 'Trianto Adi',
            'email'     => 'wartabolanet2@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 'masyarakat'
        ]);

        User::create([
            'name'      => 'Agung Budiawan',
            'email'     => 'agung@gmail.com',
            'password'  => bcrypt('1234'),
            'roles'     => 'masyarakat'
        ]);

        // Ambilantrian::create([
        //     'tanggal'       => '2023-04-17 00:00:00',
        //     'nama_lengkap'  => 'Galang Adi Trianto',
        //     'kode'          => 'KTP',
        //     'alamat'        => 'Banyuurip',
        //     'nomorhp'       => '08122832323',
        //     'antrian_id'    => 1,
        //     'user_id'       => 2
        // ]);

    }
}
