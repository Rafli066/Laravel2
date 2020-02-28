<?php

use App\Mahasiswa;
use App\Dosen;
use App\Wali;
use App\Hobi;

Route::get('/', function () {
    return view('welcome');
});


//Route Mahasiswa
Route::get('relasi1', function () {
    $mahasiswa = Mahasiswa::where('nim', '=', '130103')->first();
    return $mahasiswa->Wali->nama;
});
Route::get('relasi2', function () {
    $mahasiswa = Mahasiswa::where('nim', '=', '130103')->first();
    return $mahasiswa->Dosen->nama;
});
Route::get('relasi3', function () {
    $dosen = Dosen::where('nama', '=', 'Gunawan')->first();
    foreach ($dosen->Mahasiswa as $temp)
        echo '<li>Nama : ' . $temp->nama . '<br>' .
        '<strong>' . $temp->nim . '</strong></li>';
});

Route::get('relasi4', function () {
    $kipli = Mahasiswa::where('nama', '=', 'Kiplii')->first();
    //Menampilkan Seluruh Hobi Dari Kiplii
    foreach ($kipli->Hobi as $temp)
        echo '<li><strong>Hobi : ' . $temp->hobi . '</strong></li>';
});
Route::get('relasi5', function () {
    $gaming = Hobi::where('hobi', '=', 'Ngaji Peuting')->first();
    //Menampilkan Semua aData Mahasiswa Yang Hobi Mengaji
    foreach ($gaming->Mahasiswa as $temp)
        echo '<li><strong>Nama : ' . $temp->nama . '</strong>'.
             '<strong><br>Nim : ' . $temp->nim . '</strong></br></li>';
});

Route::get('relasi-join', function () {
    $sql = DB::table('mahasiswas')
        ->select('mahasiswas.nama', 'mahasiswas.nim', 'walis.nama as nama_wali')
        ->join('walis', 'walis.id_mahasiswa', '=', 'mahasiswas.id')->get();
});

//Route Eloquent
Route::get('eloquent', function () {
    $mahasiswa = Mahasiswa::with('wali', 'dosen', 'hobi')->get();
    return view('eloquent', compact('mahasiswa'));
});


Route::get('latihan-eloquent', function () {
    $tgs = Mahasiswa::with('wali','dosen','hobi')->take(1)->get();
    return view('latihan-eloquent', compact('tgs'));
});

/////////////////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ROUTE BLADE TEMPLATE
Route::get('beranda', function () {
    return view('beranda');
});
Route::get('kontak', function () {
    return view('kontak');
});
Route::get('tentang', function () {
    return view('tentang');
});

//Route CRUD
Route::resource('dosen', 'DosenController');

Route::resource('hobi', 'HobiController');

Route::resource('mahasiswa', 'MahasiswaController');


























