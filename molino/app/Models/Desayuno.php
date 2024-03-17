<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desayuno extends Model
{
    /*use HasFactory;*/
    protected $table = 'desayunos';
    protected $primaryKey = 'desayuno_id';
    protected $fillable = ['titulo','precio','descripcion','categoria','imagen','imagen_descripcion'];
}
