<?php

use App\User;
use App\Direktorat;
use App\Knowledge;
use Illuminate\Database\Seeder;

class KnowledgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Knowledge::class)->create([
            'nik_pegawai' => 640830,
            'direktorat' => 'KUG & Kepesertaan',
            'judul' => 'Pemberian hak akses',
            'jenis' => 'Tacit',
            'status' => 0,
            'deskripsi' => 'Lorem ipsum',
            ]);
    }
}
