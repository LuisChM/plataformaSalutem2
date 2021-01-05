<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['descripcion'];

    public function producto(){
        return $this->hasMany(Productos::class);
    }
}
