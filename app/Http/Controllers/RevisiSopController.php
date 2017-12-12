<?php

namespace App\Http\Controllers;

use App\RevisiSop;
use App\Sop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RevisiSopController extends Controller
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
    public function create(Request $request)
    {
        $id_sop = $request->id_sop;
        if (empty($id_sop)) {
            return redirect('sop');
        }

        return view('admin.revisiSop.create', ['id_sop'=>$id_sop]);
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

        $dataRevisiSop= new \App\RevisiSop;
        $dataRevisiSop->id_sop =  intval($request->id_sop);
        $dataRevisiSop->nik_pegawai = $user->nik;
        $dataRevisiSop->status = $request->status= 'Dipertimbangkan';
        $dataRevisiSop->deskripsi = $request->deskripsi;
        $dataRevisiSop->save();

        // $dataSop = Sop::find(intval($request->id_sop)); 
        // $dataSop = $dataRevisiSop->sop->toArray();
        // dd($dataSop);

        return redirect()->route('sop.data', ['kode_direktorat' => $dataRevisiSop->id_sop]);

        // return view('admin.sop.data', ['dataSop'=>$dataSop, 'kode_direktorat'=>$dataSop->kode_direktorat]);

        // return view('admin.sop.data', compact('dataRevisiSop'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RevisiSop  $revisiSop
     * @return \Illuminate\Http\Response
     */
    public function show(RevisiSop $revisiSop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RevisiSop  $revisiSop
     * @return \Illuminate\Http\Response
     */
    public function edit(RevisiSop $revisiSop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RevisiSop  $revisiSop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RevisiSop $revisiSop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RevisiSop  $revisiSop
     * @return \Illuminate\Http\Response
     */
    public function destroy(RevisiSop $revisiSop)
    {
        //
    }
}
