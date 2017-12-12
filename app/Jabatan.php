<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table='jabatan';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'kode';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
