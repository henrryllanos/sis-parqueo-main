<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'direccion',
        'fecha_nac',
        'foto_perfil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }
    public function notificaciones()
    {
        return $this->hasMany(notificacion::class);
    }
    public function solicitud_parqueo(){
        return $this->hasMany(SolicitudParqueo::class,'usuario_id');
    }

    public function pagos(){
        return $this->hasMany(pagoqr::class,'usuario_id');
    }
}
