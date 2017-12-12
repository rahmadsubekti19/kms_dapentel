<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notulensi extends Model
{
	protected $table = 'notulensi';

	protected $fillable= [
		'tgl_dibuat',
		'kode_direktorat',
		'tempat',
		'agenda',
		'nik_pegawai',
		'topik_bahasan',
		'catatan_diskusi',
		'kep_tindakan',
		'file',
	];
	
	public function presensi(){
		return $this->belongsToMany('App\User', 'presensi', 'id_notulensi', 'nik_pegawai');
	}

	public function user(){
		return $this->belongsTo('App\User', 'nik_pegawai');
	}

	public function direktorat(){
		return $this->belongsTo('App\Direktorat', 'kode_direktorat');
	}
}
