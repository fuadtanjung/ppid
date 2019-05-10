<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{

    protected $table = "permintaan";
    protected $primaryKey = "id_permintaan";
    public $timestamps= false;
    protected $fillable = [
        'id_user', 'id_instansi', 'pengguna_info', 'nomor_ktp', 'no_telepon', 'alamat_pengguna',
        'email_pengguna', 'info_diminta', 'alasan', 'alasan_pengguna', 'tgl_permintaan', 
        'ket', 'tgl_konfirm', 'pesan'
    ];

    public function users()
    {
        return $this->hasOne('App\Models\Pengguna', 'id_user', 'id_user');
    }

    public function instansi()
    {
        return $this->hasOne('App\Models\Instansi', 'id_instansi', 'id_instansi');
    }

}