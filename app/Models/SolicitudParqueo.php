<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudParqueo extends Model
{
    use HasFactory;
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function respuesta(){
        return $this->hasOne(Respuesta::class,'solicitud_id');
    }
}
