<?php

use App\User;
use App\Role;
use App\Jabatan;
use App\Direktorat;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class)->create([
            'nik' => 640830,
            'nama' => 'Asep Beni Mustopa',
            'email' => '640830@telkom.co.id',
            'kode_jabatan' => 9331,
            'kode_direktorat' => 3,
            'id_role' => 1,
            ]);

        factory(User::class)->create([
            'nik' => 107501,
            'nama' => 'Kosasih',
            'email' => 'kozzarrasyad@gmail.com',
            'kode_jabatan' => 9391,
            'kode_direktorat' => 3,
            'id_role' => 2,
            ]);


        factory(User::class)->create([
            'nik' => 976615,
            'nama' => 'Lusi Pidia Yanti',
            'email' => '976615@telkom.co.id',
            'kode_jabatan' => 9254,
            'kode_direktorat' => 2,
            'id_role' => 3,
            ]);

    }
}
