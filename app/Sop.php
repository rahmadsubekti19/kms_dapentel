<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    protected $table= 'sop';

    protected $fillable= [
    	'nik_pegawai',
    	'kode_direktorat',
    	'judul',
    	'deskripsi',
    	'file',
    	'versi',
    	'tgl_dibuat',
        'jumlah_acuan',
    ];

    public function direktorat(){
    	return $this->belongsTo('App\Direktorat', 'kode_direktorat');
    }

    public function user(){
        return $this->belongsTo('App\User', 'nik_pegawai');
    }

    public function komentarSop(){
        return $this->hasMany('App\KomentarSop', 'id_sop');
    }

    public function revisiSop(){
        return $this->hasMany('App\RevisiSop', 'id_sop');
    }
}
