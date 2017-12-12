<?php

use Illuminate\Database\Seeder;
use App\Direktorat;

class DirektoratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Direktorat::class)->create([
    		'kode' => 1,
    		'nama' => 'Investasi',
    		]);

    	factory(Direktorat::class)->create([
    		'kode' => 2,
    		'nama' => 'Kepesertaan',
    		]);

    	factory(Direktorat::class)->create([
    		'kode' => 3,
    		'nama' => 'KUG & SDM',
    		]);

    	factory(Direktorat::class)->create([
    		'kode' => 4,
    		'nama' => 'General Affair',
    		]);
    	
    	factory(Direktorat::class)->create([
    		'kode' => 5,
    		'nama' => 'Internal Audit',
    		]);
    }
}
