<?php

use Illuminate\Database\Seeder;
use App\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Jabatan::class)->create([
    		'kode' => 9331,
    		'nama' => 'Kabag Sistem Informasi',
    		]);

    	factory(Jabatan::class)->create([
    		'kode'=>9254,
    		'nama'=>'Officer-2 Data Pensiun',
    		]);

    	factory(Jabatan::class)->create([
    		'kode'=>9391,
    		'nama'=>'Staff Senior Bagian Sistem Informasi',
    		]);
    }
}
