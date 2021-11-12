@extends('arsip.form')
@section('form-input')
    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf
        <table class="table border-0">
            <tr>
                <td>Nomor Surat</td>
                <td class="d-flex flex-column">
                    <input name="surat_nomor" type="text" value="{{ old('surat_nomor') }}" class="w-25">
                    @error('surat_nomor')
                        <span class="text-danger pt-1"> {{$message}} </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td class="d-flex flex-column">
                    <select class="w-50" name="kategori_id" class="form-control">
                        <option {{ old('kategori_id')==1 ? 'selected': '' }} value="1">Undangan</option>
                        <option {{ old('kategori_id')==2 ? 'selected': '' }} value="2">Pengumuman</option>
                        <option {{ old('kategori_id')==3 ? 'selected': '' }} value="3">Nota Dinas</option>
                        <option {{ old('kategori_id')==4 ? 'selected': '' }} value="4">Pemberitahuan</option>
                    </select>
                    @error('kategori_id')
                        <span class="text-danger pt-1"> {{$message}} </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Judul</td>
                <td class="d-flex flex-column">
                    <input name="surat_judul" value="{{ old('surat_judul') }}" type="text">
                    @error('surat_judul')
                        <span class="text-danger pt-1"> {{$message}} </span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>File Surat (PDF)</td>
                <td class="d-flex flex-column">
                    <input type="file" name="surat_file" value="{{ old('surat_file') }}" accept="application/pdf"/>
                    @error('surat_file')
                        <span class="text-danger pt-1"> {{$message}} </span>
                    @enderror
                </td>
            </tr>
        </table>
        <a class="btn btn-dark" href="{{route("arsip")}}"><< Kembali</a>
        <button type="submit" class="btn btn-dark">Simpan</button>
    </form>
@endsection
