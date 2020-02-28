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
                        <b>DATA HOBI</b>
                        <a href="{{route('hobi.create')}}"
                           class="float-right">
                            Tambah Data Hobi
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA HOBI</th>
                                        <th>A K S I</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($hobi as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->hobi}}</td>
                                        <td>
                                            <form action="{{route('hobi.destroy',$data->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('hobi.show',$data->id)}}" class="btn btn-warning">Show</a> |
                                                <a href="{{route('hobi.edit',$data->id)}}" class="btn btn-primary">Edit</a> |
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
