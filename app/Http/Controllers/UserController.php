<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dataPegawai=User::with('direktorat','jabatan','role')->paginate(10);

        return view('admin.user.data', compact('dataPegawai'));
    }

    public function dataUser()
    {
        
        $dataPegawai=User::with('direktorat','jabatan','role')->paginate(10);

        return view('managerial.user.index', compact('dataPegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $dataPegawai=$request->all(); ==> uji coba 
        // return $dataPegawai;

        $this->validate($request, [
        'nik' =>'required|unique:pegawai',
        'email' => 'required|email|unique:pegawai',
        ]);

        $dataPegawai= new \App\User;
        $dataPegawai->nik = $request->nik;
        $dataPegawai->nama = $request->nama;
        $dataPegawai->email = $request->email;
        $dataPegawai->kode_jabatan = $request->kode_jabatan;
        $dataPegawai->kode_direktorat = $request->kode_direktorat;
        $dataPegawai->id_role = $request->id_role;
        $dataPegawai->password = bcrypt($request->password);
        $dataPegawai->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        $dataPegawai=User::findOrFail($nik);
         // dd($dataPegawai);
        return view('admin.user.show', compact('dataPegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $dataPegawai=User::findOrFail($nik);
        return view('admin.user.edit', compact('dataPegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $dataPegawai= User::findOrFail($nik);
        $dataPegawai->nik = $request->nik;
        $dataPegawai->nama = $request->nama;
        $dataPegawai->email = $request->email;
        $dataPegawai->kode_jabatan = $request->kode_jabatan;
        $dataPegawai->kode_direktorat = $request->kode_direktorat;
        $dataPegawai->id_role = $request->id_role;
        if(!is_null($request->password)){
            $dataPegawai->password = bcrypt($request->password);
        }
        $dataPegawai->save();
        
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $dataPegawai=User::findOrFail($nik);
        $dataPegawai->delete();
        return redirect('users');
    }

    public function profile(){
        $user=Auth::user();

        return view('admin.user.profile', ['user'=> $user]);
    }
}
