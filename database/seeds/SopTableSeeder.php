<?php

use App\User;
use App\Sop;
use Illuminate\Database\Seeder;

class SopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sop::class)->create([
        	'nik_pegawai'=>User::whereNik(640830)->first()->nik,
            'judul'=>'Kepesertaan',
            'keterangan'=>'No desc',
        ]);

    }
}
