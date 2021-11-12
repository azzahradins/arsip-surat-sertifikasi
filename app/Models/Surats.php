<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surats extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable= [
        'surat_nomor',
        'kategori_id',
        'surat_judul',
        'surat_date',
        'surat_file',
    ];

    public function kategoris()
    {
        return $this->belongsTo(Kategoris::class, 'kategori_id');
    }
}
