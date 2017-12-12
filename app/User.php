<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'nik';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $table = 'pegawai';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 'nama', 'email', 'password', 'kode_jabatan', 'kode_direktorat', 'id_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relation with other table
    public function direktorat(){
        return $this->belongsTo(Direktorat::class, 'kode_direktorat');
    }

    public function jabatan(){
        return $this->belongsTo(Jabatan::class, 'kode_jabatan');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function knowledge(){
        return $this->hasMany('App\Knowledge', 'nik_pegawai');
    }

    public function sop(){
        return $this->hasMany('App\Sop', 'nik_pegawai');
    }

    public function revisiSop(){
        return $this->hasMany('App\RevisiSop', 'nik_pegawai');
    }

    public function presensi(){
        return $this->belongsToMany('App\Presensi', 'presensi', 'nik_pegawai', 'id_notulensi');
    }

    public function getRouteKeyName()
    {
        return 'nik';
    }

    public function post(){
        return $this->hasMany('App\Post', 'nik_pegawai');
    }

    public function komentarPost(){
        return $this->hasMany('App\komentarPost', 'nik_pegawai');
    }
    
}
