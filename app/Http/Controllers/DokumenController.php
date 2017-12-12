<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Sop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sop_id=$request->sop_id;
        if (empty($sop_id)) {
            return redirect('sop');
        }
        $dataDokumen=Sop::find($sop_id)->dokumen;
        //Dokumen::with('sop')->paginate(10);
        // dd($dataDokumen);


        return view('admin.sop.dokumen.index', ['dataDokumen'=>$dataDokumen, 'sop_id'=>$sop_id]);
    }

    public function list(Request $request)
    {
        $sop_id=$request->sop_id;
        if (empty($sop_id)) {
            return redirect('sop');
        }
        $dataDokumen=Dokumen::with('sop')->paginate(10);

        return view('admin.sop.dokumen.list', ['dataDokumen'=>$dataDokumen, 'sop_id'=>$sop_id]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sop_id=$request->sop_id;
        if(empty($sop_id)){
            return redirect('sop');
        }


        return view('admin.sop.dokumen.create', ['sop_id'=>$sop_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file);

      $this->validate($request, [
        'judul' =>'required|unique:dokumen',
        'file' => 'required|max:700000',
        ]);

      $sop_id = $request->sop_id;

      $file  = $request->file('file');
      
      $dataDokumen= new \App\Dokumen;
      $dataDokumen->id_sop = $sop_id;
      $dataDokumen->judul = $request->judul;
      $dataDokumen->file = $file->getClientOriginalName();
      $dataDokumen->deskripsi= $request->deskripsi;
      $dataDokumen->save();

      //setting path
      $path='uploads';
      // Storage::putFileAs(
      //   'uploads', $request->file('file'), $file->getClientOriginalName()
      //   );

     // Do upload
      $file->move($path, $file->getClientOriginalName());


      // return redirect('dokumen', ['sop_id'=>$sop_id]);
      return redirect()->action(
        'DokumenController@index', ['sop_id' => $sop_id]
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $dataDokumen=Dokumen::findOrFail($id);

        \File::delete(str_replace("\\", "\\\\", realpath(public_path('uploads/'.$dataDokumen->file))));
        $dataDokumen->delete();

        return redirect(route('dokumen.index', $dataDokumen));

    }

    public function getDokumenJson($id){
        $dataDokumen = Dokumen::findOrFail($id);
        // dd($dataDokumen);
        return response()->json([
            'dataDokumen' => $dataDokumen,
            'revisi' => $dataDokumen->revisi
        ]);
    }
}
