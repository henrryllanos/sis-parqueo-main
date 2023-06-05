<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parqueo extends Model
{
    use HasFactory;
    public function zona(){
        return $this->belongsTo(zona::class);
    }

    public function respuestas(){
        return $this->hasMany(Respuesta::class,'parqueo_id');
    }
}
