<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = "tanggapan";
    protected $primaryKey = "id_tanggapan";
    public $timestamps= false;
    protected $fillable = [
       'id_user', 'id_instansi', 'id_permintaan', 'pesan'
    ];

    public function users()
    {
        return $this->hasOne('App\Models\Pengguna', 'id_user', 'id_user');
    }

    public function instansi()
    {
        return $this->hasOne('App\Models\Instansi', 'id_instansi', 'id_instansi');
    }

    public function permintaan()
    {
        return $this->hasOne('App\Models\Permintaan', 'id_permintaan', 'id_permintaan');
    }
}
