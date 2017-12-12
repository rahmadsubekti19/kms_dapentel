<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
	protected $table = 'knowledge';

	protected $fillable = [
		'nik', 'judul', 'kode_direktorat', 'jenis','status','deskripsi', 'file'
	];

	public function user(){
		return $this->belongsTo(User::class, 'nik_pegawai');
	}

	public function direktorat(){
		return $this->belongsTo(Direktorat::class, 'kode_direktorat');
	}
}
