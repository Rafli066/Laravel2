@extends('layouts.app')
@section('content')

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>HALAMAN UTAMA</b></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @php $no = 1; @endphp
                    <li class="nav-item">
                        <a href="{{route('dosen.index')}}">
                            Dosen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('hobi.index')}}">
                            Hobi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('mahasiswa.index')}}">
                            Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wali.index')}}">
                            Wali
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
