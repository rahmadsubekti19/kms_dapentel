<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Direktorat;
use App\Sop;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allDirectorates =  Direktorat::paginate(10);

        return view('admin.sop.index', compact('allDirectorates'));
    }

    public function data(Request $request)
    {
        $kode_direktorat = $request->kode_direktorat;
        if (empty($kode_direktorat)) {
            return redirect('sop');
        }
        $dataSop = Direktorat::find($kode_direktorat)->sop;

        return view('admin.sop.data', ['dataSop'=>$dataSop, 'kode_direktorat'=>$kode_direktorat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    //     $user=Auth::user();
     $kode_direktorat = $request->kode_direktorat;
     if (empty($kode_direktorat)) {
        return redirect('sop');
    }

    return view('admin.sop.create', ['kode_direktorat'=>$kode_direktorat]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' =>'required|unique:sop',
            'file' => 'max:700000',
        ]);

        $user = Auth::user();
        $kode_direktorat = $request->kode_direktorat;

        $file  = $request->file('file');

        $dataSop= new \App\Sop;
        $dataSop->nik_pegawai = $user->nik;
        $dataSop->kode_direktorat = $kode_direktorat;
        $dataSop->judul = $request->judul;
        $dataSop->deskripsi= $request->deskripsi;
        $dataSop->file = $file->getClientOriginalName();
        $dataSop->versi= $request->versi;
        $dataSop->tgl_dibuat= $request->tgl_dibuat;
        $dataSop->jumlah_acuan= $request->jumlah_acuan= 0;
        $dataSop->save();

      //setting path
        $path='uploads';
      // Storage::putFileAs(
      //   'uploads', $request->file('file'), $file->getClientOriginalName()
      //   );

     // Do upload
        $file->move($path, $file->getClientOriginalName());


      // return redirect('Sop', ['sop_id'=>$sop_id]);
        return redirect()->action(
            'SopController@data', ['kode_direktorat' => $kode_direktorat]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataSop= Sop::findOrFail($id);
        return view('admin.sop.show',compact('dataSop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataSop= Sop::findOrFail($id);
        return view('admin.sop.edit',compact('dataSop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $this->validate($request, [
            'file' => 'max:700000',
        ]);

        $user = Auth::user();
        $kode_direktorat = $request->kode_direktorat;



         $file  = $request->file('file');

        $dataSop= Sop::findOrFail($id);
        $dataSop->nik_pegawai = $user->nik;
        $dataSop->kode_direktorat = $kode_direktorat;
        $dataSop->judul = $request->judul;
        $dataSop->deskripsi= $request->deskripsi;
        $dataSop->file = $file->getClientOriginalName();
        $dataSop->versi= $request->versi;
        $dataSop->tgl_dibuat= $request->tgl_dibuat;
        $dataSop->save();

      //setting path
        $path='uploads';
      // Storage::putFileAs(
      //   'uploads', $request->file('file'), $file->getClientOriginalName()
      //   );

     // Do upload
        $file->move($path, $file->getClientOriginalName());


      // return redirect('Sop', ['sop_id'=>$sop_id]);
        return redirect()->action(
            'SopController@data', ['kode_direktorat' => $kode_direktorat]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $dataSop=Sop::findOrFail($id);

        \File::delete(str_replace("\\", "\\\\", realpath(public_path('uploads/'.$dataSop->file))));
        $dataSop->delete();

        return redirect(route('sop.data', $dataSop));

    }

    public function getSopJson(Request $request, $id){

        $dataSop = Sop::findOrFail($id);

        return response()->json([
            'dataSop' => $dataSop,
            'komentar_sop' => $dataSop->komentarSop
        ]);
    }

    public function postAcuanJson(Request $request){
        $dataAcuan = Sop::findOrFail($request->id_sop);
        $dataAcuan->jumlah_acuan = $dataAcuan->jumlah_acuan + $request->counter;
        $dataAcuan->save();

        return response()->json([
            'dataAcuan' => $dataAcuan,
        ]);
    }
}
