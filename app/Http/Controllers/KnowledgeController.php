<?php

namespace App\Http\Controllers;

use App\Knowledge;
use App\User;
use App\Direktorat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataKnowledge=Knowledge::with('user', 'direktorat')
        ->where('status','=','dipertimbangkan')
        ->get();
        $dataKnowledge->count();

        $diterimaKnowledge = Knowledge::with('user', 'direktorat')
        ->where('status','=','diterima')
        ->get();
        $diterimaKnowledge->count();

        $ditolakKnowledge = Knowledge::with('user', 'direktorat')
        ->where('status','=','ditolak')
        ->get();
        $ditolakKnowledge->count();

        return view('admin.knowledge.index', compact(['dataKnowledge', 'diterimaKnowledge','ditolakKnowledge']));
    }

    public function dataKnowledge(Request $request)
    {
        $user = Auth::user();
        $dataKnowledge=Knowledge::with('user', 'direktorat')
        ->where([
            ['status', '=', 'dipertimbangkan'],
            ['kode_direktorat', '=', $user->kode_direktorat],
        ])
        ->get();
        $dataKnowledge->count();

        $diterimaKnowledge = Knowledge::with('user', 'direktorat')
        ->where([
            ['status', '=', 'diterima'],
            ['kode_direktorat', '=', $user->kode_direktorat],
        ])
        ->get();
        $diterimaKnowledge->count();

        $ditolakKnowledge = Knowledge::with('user', 'direktorat')
        ->where([
            ['status', '=', 'ditolak'],
            ['kode_direktorat', '=', $user->kode_direktorat],
        ])
        ->get();
        $ditolakKnowledge->count();

        return view('managerial.knowledge.index', compact(['dataKnowledge', 'diterimaKnowledge','ditolakKnowledge', 'user']));
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

    public function tambahKnowledge()
    {
        return view('managerial.knowledge.create');
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
            'judul' =>'required|unique:knowledge',
        ]);

        $user = Auth::user();
        $file  = $request->file('file');

        $dataKnowledge= new \App\Knowledge;
        $dataKnowledge->nik_pegawai = $user->nik;
        $dataKnowledge->kode_direktorat = $request->kode_direktorat;
        $dataKnowledge->judul = $request->judul;
        $dataKnowledge->jenis = $request->jenis;
        $dataKnowledge->status = $request->status= 'Dipertimbangkan'; // $dataKnowledge->status = $request->status= 0;
        $dataKnowledge->deskripsi = $request->deskripsi;
        $dataKnowledge->file = $request->file;

        if(! empty($file)){
            $dataKnowledge->file = $file->getClientOriginalName();
            $path='uploads';
            $file->move($path, $file->getClientOriginalName());
        }
        // dd($dataKnowledge);
        $dataKnowledge->save();

        return redirect()->action('KnowledgeController@index');
    }

    public function knowledgeStore(Request $request)
    {
        $this->validate($request, [
            'judul' =>'required|unique:knowledge',
        ]);

        $user = Auth::user();
        $file  = $request->file('file');

        $dataKnowledge= new \App\Knowledge;
        $dataKnowledge->nik_pegawai = $user->nik;
        $dataKnowledge->kode_direktorat = $request->kode_direktorat;
        $dataKnowledge->judul = $request->judul;
        $dataKnowledge->jenis = $request->jenis;
        $dataKnowledge->status = $request->status= 'Dipertimbangkan'; // $dataKnowledge->status = $request->status= 0;
        $dataKnowledge->deskripsi = $request->deskripsi;
        $dataKnowledge->file = $request->file;

        if(! empty($file)){
            $dataKnowledge->file = $file->getClientOriginalName();
            $path='uploads';
            $file->move($path, $file->getClientOriginalName());
        }
        // dd($dataKnowledge);
        $dataKnowledge->save();

        return view('managerial.knowledge.create');
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

    public function update_status(Request $request)
    {

        $updateStatus = \App\Knowledge::find($request->item_knowledge_id);
        $updateStatus->status = $request->status_knowledge;
        $updateStatus->save();

        return response()->json([
            'updateStatus' => $updateStatus,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataKnowledge=Knowledge::findOrFail($id);

        \File::delete(str_replace("\\", "\\\\", realpath(public_path('uploads/'.$dataKnowledge->file))));
        $dataKnowledge->delete();

        return redirect('knowledge');
    }

    public function knowledgeDestroy($id)
    {
        $dataKnowledge=Knowledge::findOrFail($id);

        \File::delete(str_replace("\\", "\\\\", realpath(public_path('uploads/'.$dataKnowledge->file))));
        $dataKnowledge->delete();
        return redirect('dataKnowledge');
    }
}
