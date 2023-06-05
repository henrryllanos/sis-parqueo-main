<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class notificacion extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }
}
