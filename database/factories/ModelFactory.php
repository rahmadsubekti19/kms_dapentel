<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
    	'level' => $faker->randomElement(['top_administrator', 'managerial', 'clerk']),
    ];
});

$factory->define(App\Direktorat::class, function (Faker\Generator $faker) {
    return [
    	'kode' => $faker->unique()->unixTime,
    	'nama' => $faker->unique()->name,
    ];
});

$factory->define(App\Sop::class, function (Faker\Generator $faker) {
    return [
        'nik_pegawai'=>App\User::all()->random()->nik,
        'judul'=>$faker->unique()->name,
        'keterangan'=>$faker->unique()->name,
    ];
});

$factory->define(App\Jabatan::class, function (Faker\Generator $faker) {
    return [
    	'kode' => $faker->unique()->unixTime,
    	'nama' => $faker->unique()->name,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'nik' => $faker->unique()->unixTime,
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('12345678'),
        'remember_token' => str_random(10),
        'kode_jabatan' => App\Jabatan::get()->random()->kode,
        'kode_direktorat' => App\Direktorat::get()->random()->kode,
        'id_role' => App\Role::get()->random()->id,
    ];
});
