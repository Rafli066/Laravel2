@extends('layouts.app')
@section('content')

<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <b>DATA MAHASISWA</b>
                        <a href="{{route('mahasiswa.create')}}"
                           class="float-right">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>NIM</th>
                                        <th>NAMA DOSEN</th>
                                        <th>A K S I</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($mahasiswa as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->nim}}</td>
                                        <td>{{$data->dosen->nama}}</td>
                                        <td>
                                            <form action="{{route('mahasiswa.destroy',$data->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('mahasiswa.show',$data->id)}}" class="btn btn-warning">Show</a> |
                                                <a href="{{route('mahasiswa.edit',$data->id)}}" class="btn btn-primary">Edit</a> |
                                                <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
@endsection
