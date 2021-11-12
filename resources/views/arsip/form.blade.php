@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <h2>Arsip Surat >> Unggah</h2>
                <p class="w-75 m-0">Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br> Catatan:</p>
                <ul>
                    <li>Gunakan File Berformat PDF</li>
                </ul>
            </div>
            <div class="col-md-11 border-0">
                @yield('form-input')
            </div>
        </div>
    </div>
@endsection
