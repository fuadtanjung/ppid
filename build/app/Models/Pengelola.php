<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pengelola extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "pengelola";
    protected $primaryKey = "id_pengelola";
    public $timestamps= false;
    protected $fillable = [
        'id_instansi', 'username', 'email', 'password', 'level', 'status'
    ];

    public function getIsAdminAttribute($value)
    {
        if($this->attributes['level']=='admin') return true;

        return false;
    }

    public function instansi()
    {
        return $this->hasOne('App\Models\Instansi', 'id_instansi', 'id_instansi');
    }
}
