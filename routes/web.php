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


//Route Eloquent Latihan
// Route::get('latihan-eloquent', function () {
//     $tgs = Mahasiswa::with('wali', 'dosen', 'hobi')->get();
//     return view('latihan-eloquent', compact('tgs'));
// });

Route::get('latihan-eloquent', function () {
    $tgs = DB::table('mahasiswas')
        ->select('mahasiswas.nama', 'walis.nama as nama_wali', 'dosens.nama as nama_dosen', 'dosens.nipd',
                'mahasiswas.hobi as id_hobi')
        ->join('walis', 'walis.id_mahasiswa', '=', 'mahasiswas.id')
        ->join('dosens', 'dosens.id_mahasiswa', '=', 'mahasiswas.id')->get();
});
