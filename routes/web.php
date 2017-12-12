<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('sop', function(){
	return view('admin.sop.index');
})->name('sop');

//Ini route untuk managerial
Route::get('dataUser', 'UserController@dataUser')->name('dataUser');

Route::get('dataKnowledge', 'KnowledgeController@dataKnowledge')->name('dataKnowledge');

Route::get('tambahKnowledge', 'KnowledgeController@tambahKnowledge')->name('tambahKnowledge');

Route::post('knowledgeStore', 'KnowledgeController@knowledgeStore')->name('knowledgeStore');

Route::delete('knowledgeDestroy/{id}', 'KnowledgeController@knowledgeDestroy')->name('knowledgeDestroy');

//Ini route untuk admin
Route::resource('users', 'UserController');

Route::resource('direktorat', 'DirektoratController');

Route::get('get-sop-json/{id}','SopController@getSopJson');

Route::post('post-acuan-json', 'SopController@postAcuanJson');

Route::get('/sop/data', 'SopController@data')->name('sop.data');

Route::resource('sop', 'SopController');

Route::post('komentarSop', 'KomentarSopController@store');

Route::resource('revisiSop', 'RevisiSopController');

Route::post('knowledge/update_status', 'KnowledgeController@update_status');

Route::resource('knowledge', 'KnowledgeController');

Route::get('profile', 'UserController@profile')->name('profile');

Route::resource('notulensi', 'NotulensiController');

Route::get('detail', 'NotulensiController@detail')->name('detail');

Route::get('dompdf/{id}','NotulensiController@dompdf')->name('dompdf');

Route::get('beranda', function(){
	return view('admin.stream.beranda');
})->name('beranda');

?>