<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function index()
    {
        $mahasiswa = Mahasiswa::with('dosen')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $dosen = Dosen::all();
        return view('mahasiswa.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->id_dosen = $request->id_dosen;
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')->with(['message' => 'Data Berhasil Ditambah']);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFind($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->id_dosen = $request->id_dosen;
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')->with(['message' => 'Data Berhasil Di Ubah']);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id)->delete();
        return redirect()->route('mahasiswa.index')->with(['message' => 'Data Berhasil Dihapus']);
    }
}
