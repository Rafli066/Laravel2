@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <form action="{{route('mahasiswa.update', $mahasiswa->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="">Nama Mahasiswa</label>
                                    <input type="text" name="nama" value="{{$mahasiswa->nama}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">N I M</label>
                                    <input type="number" name="nim" value="{{$mahasiswa->nim}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Dosen</label>
                                    <select name="id_dosen" class="form-control" required>
                                    @foreach ($dosen as $data)
                                        <option value="{{$data->id}}"
                                            {{$data->id == $mahasiswa->id_dosen ? "selected" : ""}}>{{$data->nama}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                    <a href="{{url()->previous()}}" class="btn btn-primary">KEMBALI</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
