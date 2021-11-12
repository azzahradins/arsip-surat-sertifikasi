@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <h2>Arsip Surat >> Detail</h2>
            <p class="w-75">
                <ul class="text-decoration-none">
                    <li>Nomor: {{$surat->surat_nomor}}</li>
                    <li>Kategori: {{$surat->kategoris["kategori_nama"]}}</li>
                    <li>Judul: {{$surat->surat_judul}}</li>
                    <li>Waktu Unggah: {{date('d F Y - (m:h)', strtotime($surat->surat_date));}}</li>
                </ul>
            </p>
        </div>
        <div class="col-md-11">
            <embed src="{{asset("storage/$surat->surat_file")}}" width="100%" height="400px"/>
        </div>
        <div class="col-md-11">
            <a class="btn btn-dark" href="{{route("arsip")}}"><< Kembali</a>
            <a class="btn btn-dark" href="{{asset("storage/$surat->surat_file")}}" download>Unduh</a>
            <a class="btn btn-dark" href="{{route("arsip.edit",['surat'=>$surat->id])}}">Edit/Ganti File</a>
        </div>
    </div>
</div>
@endsection
