<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class   Pengguna extends Authenticatable
{
    use Notifiable;
    protected $guard = 'pengguna';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'nama','no_ktp','tempat_lhr','tgl_lhr','alamat',
        'pekerjaan','no_telp','email','username',
    ];

    protected $hidden = [
        'password'
    ];
}
