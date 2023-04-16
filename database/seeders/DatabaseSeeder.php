<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $roles = [
            ['level' => 'administrator'],
            ['level' => 'petugas'],
        ];

        DB::table('roles')->insert($roles);
        
        DB::table('users')->insert([
            'nama_petugas' => 'Admin',
            'username' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt(12345678),
            'id_role' => 1
        ]);

        DB::table('masyarakats')->insert([
            'nama_lengkap' => 'Masyarakat',
            'username' => 'Masyarakat',
            'email' => 'Masyarakat@gmail.com',
            'telp' => '09888',
            'password' => bcrypt(12345678)
        ]);
    }
}
