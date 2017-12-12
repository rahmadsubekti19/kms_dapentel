<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevisiSop extends Model
{
    protected $table = 'revisi_sop';

    protected $fillable = [
    	'nik_pegawai',
    	'id_sop',
    	'status',
    	'deskripsi',
    ];

    public function sop(){
    	return $this->belongsTo('App\Sop', 'id_sop');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'nik_pegawai');
    }
}
