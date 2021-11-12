@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <h2>Arsip Surat</h2>
                <p class="w-75">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br> Klik "Lihat pada kolom aksi untuk menampilkan surat."</p>
            </div>
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{ session()->get('message') }}
                    </div>
                @endif
                <div class="container">
                    <form class="form" method="get" action="{{ route('arsip') }}">
                        <div id="search" class="row my-3 d-block">
                            <span class="col-2">Cari Surat</span>
                            <input type="text" value="{{$request->query('search')? $request->query('search') : null}}" name="search" class="w-full col-8" placeholder="Cari Kode/Judul Surat">
                            <input type="submit" value="Cari!" class="col col-1 align-middle rounded btn-dark text-s">                        </form>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Waktu Pengerjaan</th>
                            <th scope="col" colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surat as $s)
                            <tr>
                                <td>{{$s->surat_nomor}}</td>
                                <td>{{$s->kategoris["kategori_nama"]}}</td>
                                <td>{{$s->surat_judul}}</td>
                                <td>{{date('d F Y - (m:h)', strtotime($s->surat_date));}}</td>
                                <td class="btn btn-danger p-2">
                                    <a class="text-decoration-none text-light" data-toggle="modal" data-target="#myModal-{{$s->id}}"> Hapus </a>
                                </td>
                                <td class="btn btn-warning p-2">
                                    <a class="text-decoration-none text-dark" href="{{asset("storage/$s->surat_file")}}" download> Unduh </a>
                                </td>
                                <td class="btn btn-info p-2">
                                    <a class="text-decoration-none text-dark" href="{{route('arsip.detail', $s->id)}}"> Lihat >> </a>
                                </td>
                                <div id="myModal-{{$s->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Konfirmasi penghapusan data</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda ingin menghapus: <br> ({{$s->surat_nomor}} - {{$s->surat_judul}})?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('arsip.delete', ['surat'=>$s->id])}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
                                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <!-- Modal -->
                        @empty
                            <tr>
                                <td colspan="99" class="text-center"> - Data Surat Kosong -</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <a class="btn btn-dark" href="{{route("arsip.create")}}">Arsipkan Surat</a>
            </div>
        </div>
    </div>
@endsection
