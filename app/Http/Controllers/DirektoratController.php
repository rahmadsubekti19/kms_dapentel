<?php

namespace App\Http\Controllers;
use App\Direktorat;
use Illuminate\Http\Request;

class DirektoratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataDirektorat = Direktorat::paginate(10);

        return view('admin.direktorat.index', compact('dataDirektorat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataDirektorat= new \App\Direktorat;
        $dataDirektorat->kode = $request->kode;
        $dataDirektorat->nama = $request->nama;

        $dataDirektorat->save();

        
        return redirect('/direktorat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode)
    {
        $dataDirektorat= Direktorat::findOrFail($kode);
        $dataDirektorat->kode = $request->kode;
        $dataDirektorat->nama = $request->nama;
       
        $dataDirektorat->save();
        
        return redirect('/direktorat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        $dataDirektorat=Direktorat::findOrFail($kode);
        $dataDirektorat->delete();
        return redirect('/direktorat');
    }
}
