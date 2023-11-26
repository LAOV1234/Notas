<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    use HasFactory;

    public function notas(){
        return $this->hasmany(Nota::class);
        
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
