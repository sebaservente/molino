<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /*use HasFactory;*/
    protected $table = 'productos';
    protected $primaryKey = 'producto_id';
    protected $fillable = ['titulo','precio','descripcion','categoria','imagen','imagen_descripcion'];

    public const VALIDAR_CREAR_PRODUCTOS = [
        'titulo' => 'required|min:2',
        'precio' => 'required|numeric|min:0',
        /*'cantidad' => 'required|numeric|min:0',
        'descripcion' => 'required|min:2',
        'alt_imagen' => 'required|min:2',*/
    ];
    public const MENSAJES_PRODUCTOS = [
        'titulo.required' => 'El titulo del producto es obligatorio.',
        'titulo.min' => 'Debes escribir al menos :min caracteres.',
        'precio.required' => 'El precio del producto es obligatorio.',
        'precio.numeric' => 'El precio debe ser un numero.',
        'precio.min' => 'El precio debe ser positivo.',
        /*'cantidad.required' => 'La cantidad del equipo es obligatoria.',
        'cantidad.numeric' => 'La cantidad debe ser un numero.',
        'cantidad.min' => 'La cantidad debe ser positiva.',
        'descripcion.required' => 'La descripción del equipo es obligatoria.',
        'descripcion.min' => 'Debes escribir al menos :min caracteres.',
        'alt_imagen.required' => 'La descripción de la imagen es obligatoria.',
        'alt_imagen.min' => 'Debes escribir al menos :min caracteres.',*/
    ];

}
