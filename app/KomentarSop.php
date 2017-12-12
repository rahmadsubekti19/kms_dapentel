<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarSop extends Model
{
    protected $table = 'komentar_sop';

    protected $fillable = ['id_sop', 'nik_pegawai' ,'deskripsi'];

    protected $with = ['user'];

    public function sop(){
    	return $this->belongsTo('App\Sop', 'id_sop');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'nik_pegawai');
    }
}
