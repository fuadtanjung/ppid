<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';
    protected $primaryKey = 'id_info';
    public $timestamps = false;
    protected $fillable = [
        'id_instansi', 'id_kategori', 'nama_info', 'file_info', 'tgl_info',
        'status', 'tanggal_buat', 'jangka_waktu', 'penanggungjawab', 'ringkasan'
    ];

    public function instansi()
    {
        return $this->hasOne('App\Models\Instansi', 'id_instansi', 'id_instansi');
    }
}
