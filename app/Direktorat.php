<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direktorat extends Model
{
    protected $table='direktorat'; 

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

    public function knowledge(){
        return $this->hasMany('App\Knowledge', 'kode_direktorat');
    }

    public function sop(){
        return $this->hasMany('App\Sop', 'kode_direktorat');
    }
}
