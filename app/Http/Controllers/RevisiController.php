<?php

namespace App\Http\Controllers;

use App\Revisi;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request->deskripsi);
        $user = Auth::user();

        $dataRevisi= new \App\Revisi;
        $dataRevisi->id_dokumen =  intval($request->id_dokumen);
        $dataRevisi->nik_pegawai = $user->nik;
        $dataRevisi->deskripsi = $request->deskripsi;
        $dataRevisi->save();

        
        return response()->json(compact("dataRevisi"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Revisi  $revisi
     * @return \Illuminate\Http\Response
     */
    public function show(Revisi $revisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Revisi  $revisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Revisi $revisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Revisi  $revisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revisi $revisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Revisi  $revisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revisi $revisi)
    {
        //
    }
}
