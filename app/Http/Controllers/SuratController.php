<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\Surats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SuratController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if($request->query('search')){
            $query = $request->query('search');
            $surat = Surats::with('kategoris')
                        ->where('surat_judul','LIKE', "%$query%")
                        ->orWhere('surat_nomor', 'LIKE', "%$query%")
                        ->get();
        }else{
            $surat = Surats::with('kategoris')->get();
        }
        return view('dashboard', ['surat' => $surat, 'request' => $request]);
    }

    public function create(){
        return view('arsip/form/add')->with('option', 'add');
    }

    public function store(StoreSuratRequest $request){
        $extFile = $request->surat_file->getClientOriginalExtension();
        $namaFile = time().".".$extFile;
        $request->surat_file->storeAs('public', $namaFile);

        Surats::create([
            'surat_nomor' => $request->surat_nomor,
            'kategori_id' => $request->kategori_id,
            'surat_judul' => $request->surat_judul,
            'surat_date' => now(),
            'surat_file' => $namaFile,
        ]);
        $request->session()->flash('message',"Penambahan surat $request->surat_nomor berhasil");
        return redirect()->route('arsip');
    }

    public function edit(Surats $surat){
        return view('arsip/form/edit', ['surat'=>$surat]);
    }

    public function update(UpdateSuratRequest $surat){
        $updateData = Surats::find($surat->id);
        if($surat->surat_file){
            File::delete(asset("storage/$updateData->surat_file"));
            $extFile = $surat->surat_file->getClientOriginalExtension();
            $namaFile = time().".".$extFile;
            $surat->surat_file->storeAs('public', $namaFile);
            Surats::where('id', $surat->id)
                    ->update(['surat_nomor'=>$surat->surat_nomor, 'kategori_id'=> $surat->kategori_id, 'surat_judul'=> $surat->surat_judul, 'surat_file'=>$namaFile]);
        }else{
            Surats::where('id', $surat->id)
                    ->update(['surat_nomor'=>$surat->surat_nomor, 'kategori_id'=> $surat->kategori_id, 'surat_judul'=> $surat->surat_judul]);
        }
        $surat->session()->flash('message',"Perubahan surat $surat->surat_nomor berhasil");
        return redirect()->route('arsip');
    }

    public function delete(Surats $surat){
        $surat->delete();
        return redirect()->route('arsip')->with('message', "Hapus data $surat->surat_nomor berhasil dihapus.");
    }

    public function detail($surat){
        $surat = Surats::with('kategoris')->where('id', $surat)->first();
        return view('arsip/detail', ['surat'=>$surat]);
    }

    public function about(){
        return view('about-me');
    }
}
