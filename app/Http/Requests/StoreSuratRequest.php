<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'surat_nomor'=>'required|unique:surats,surat_nomor',
            'kategori_id'=>'required|numeric',
            'surat_judul'=>'required',
            'surat_file'=>'required|file|max:4028',
        ];
    }

    public function messages()
    {
        return [
            'surat_nomor.required' => 'Nomor surat tidak boleh kosong!',
            'surat_nomor.unique' => 'Nomor surat sudah pernah dimasukkan.',
            'kategori_id.required' => 'Kategori tidak boleh kosong!',
            'kategori_id.numeric' => 'Kategori tidak valid.',
            'surat_judul.required' => 'Judul surat harus diisi.',
            'surat_file.required' => 'File pdf harus diupload',
            'surat_file.max' => 'Maksimal ukuran file 4mb',
        ];
    }
}
