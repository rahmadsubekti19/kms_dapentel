<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Sop;
use App\KomentarSop;
use Illuminate\Http\Request;

class KomentarSopController extends Controller
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
        $user = Auth::user();

        $dataKomentarSop= new \App\KomentarSop;
        $dataKomentarSop->id_sop =  intval($request->id_sop);
        $dataKomentarSop->nik_pegawai = $user->nik;
        $dataKomentarSop->deskripsi = $request->deskripsi;
        $dataKomentarSop->save();

        $data = KomentarSop::findOrFail($dataKomentarSop->id);

        // return "hai";
        return response()->json(["dataKomentarSop" => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KomentarSop  $komentarSop
     * @return \Illuminate\Http\Response
     */
    public function show(KomentarSop $komentarSop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KomentarSop  $komentarSop
     * @return \Illuminate\Http\Response
     */
    public function edit(KomentarSop $komentarSop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KomentarSop  $komentarSop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KomentarSop $komentarSop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KomentarSop  $komentarSop
     * @return \Illuminate\Http\Response
     */
    public function destroy(KomentarSop $komentarSop)
    {
        //
    }
}
