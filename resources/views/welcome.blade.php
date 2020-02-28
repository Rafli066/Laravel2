@extends('layouts.app')

@section('content')
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
                        Wilujeung Sumping ! <br>
                        Mangga Logi-in Heula.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
