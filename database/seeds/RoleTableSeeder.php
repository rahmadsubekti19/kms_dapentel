<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class)->create([
        	'level' => 'top_administrator',
        ]);
        factory(Role::class)->create([
        	'level' => 'managerial',
        ]);
        factory(Role::class)->create([
        	'level' => 'clerk',
        ]);
    }
}
