<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Membuat satu akun Administrator bawaan
        // User::create([
        //     'name' => 'Bambang',
        //     'email' => 'bambang@tokokita.ac.id',
        //     'role' => 'pustakawan',
        //     // Hash::make() digunakan untuk mengenkripsi password.
        //     // Jangan pernah menyimpan password dalam bentuk plaintext.
        //     'password' => Hash::make('bambang123'),
            
        // ]);
        //  User::create([
        //     'name' => 'rizky',
        //     'email' => 'rizky@tokokita.ac.id',
        //     'role' => 'anggota',
        //     // Hash::make() digunakan untuk mengenkripsi password.
        //     // Jangan pernah menyimpan password dalam bentuk plaintext.
        //     'password' => Hash::make('rizky123'),
            
        // ]);
         User::create([
            'name' => 'bagas',
            'email' => 'bagas@tokokita.ac.id',
            'role' => 'admin',
            // Hash::make() digunakan untuk mengenkripsi password.
            // Jangan pernah menyimpan password dalam bentuk plaintext.
            'password' => Hash::make('bagas123'),
            
        ]);
    }
}
