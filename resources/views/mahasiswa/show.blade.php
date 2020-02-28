@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <b>Data Mahasiswa</b>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" value="{{$mahasiswa->nama}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                                <label for="">N I M</label>
                                <input type="number" name="nim" value="{{$mahasiswa->nim}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Dosen</label>
                                <input type="text" name="id_dosen" value="{{$mahasiswa->dosen->nama}}" class="form-control" readonly></input>
                            </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-primary">KEMBALI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
