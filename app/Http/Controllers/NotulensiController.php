<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Notulensi;
use App\Direktorat;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use PDF;

class NotulensiController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$dataNotulensi = Notulensi::all();
		// dd($dataNotulensi);

		return view('admin.notulensi.index', compact('dataNotulensi'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$daftarHadir = User::all();

		return view('admin.notulensi.create', compact('daftarHadir'));
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
			'kode_direktorat' =>'required',
			'tgl_dibuat' =>'required',
			'tempat' =>'required',
			'agenda' =>'required',
			'file' =>'max:7000',
		]);

		$user = Auth::user();
		$file  = $request->file('file');

		$dataNotulensi= new \App\Notulensi;
		$dataNotulensi->nik_pegawai = $user->nik;
		$dataNotulensi->kode_direktorat = $request->kode_direktorat;
		$dataNotulensi->tgl_dibuat = $request->tgl_dibuat;
		$dataNotulensi->tempat = $request->tempat;
		$dataNotulensi->agenda = $request->agenda;

		// if (is_array($request->topik_bahasan)) {
		//     echo "is array"; exit;
		// }

		$dataNotulensi->topik_bahasan = implode('$$$', $request->topik_bahasan);
		$dataNotulensi->catatan_diskusi = implode('$$$', $request->catatan_diskusi);
		$dataNotulensi->kep_tindakan = implode('$$$', $request->kep_tindakan);
		
		$dataNotulensi->file = $request->file;

		if(! empty($file)){
			$dataNotulensi->file = $file->getClientOriginalName();
			$path='uploads';
			$file->move($path, $file->getClientOriginalName());
		}

		$dataNotulensi->save();

		if (!empty($request->daftar_hadir)) {
			$dataNotulensi->presensi()->sync($request->daftar_hadir);
		}
		
		return redirect()->action('NotulensiController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Notulensi  $notulensi
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		$dataNotulensi=Notulensi::findOrFail($id);
		$dataKhusus=Notulensi::orderBy('id', 'desc')->get();
		$daftarHadir=Notulensi::find($id)->presensi()->orderBy('nama')->get();


		return view('admin.notulensi.detail', compact(['dataNotulensi', 'dataKhusus', 'daftarHadir']));
		// return view('dompdf.wrapper');
	}

	public function detail()
	{
		return view('dompdf.wrapper');	
	}

	public function dompdf(Request $request, $id)
	{
		$dataNotulensi=Notulensi::findOrFail($id);
		$dataKhusus=Notulensi::orderBy('id', 'desc')->get();
		$daftarHadir=Notulensi::find($id)->presensi()->orderBy('nama')->get();


		$tanggal = Notulensi::find($id)->where('tgl_dibuat')->get();

		$pdf = PDF::loadView('admin.notulensi.export', compact(['dataNotulensi', 'dataKhusus', 'daftarHadir']));
        return $pdf->download('Notulensi Rapat Dapentel Tanggal '.date('d-m-Y', strtotime($dataNotulensi->tgl_dibuat)).'.pdf');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Notulensi  $notulensi
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
	 * @param  \App\Notulensi  $notulensi
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Notulensi  $notulensi
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id)
	{
		$dataNotulensi=Notulensi::findOrFail($id);


		\File::delete(str_replace("\\", "\\\\", realpath(public_path('uploads/'.$dataNotulensi->file))));
		$dataNotulensi->delete();


		return redirect(route('notulensi.index', $dataNotulensi));
	}
}
