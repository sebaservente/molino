<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $producto_id
 * @property string $titulo
 * @property int $precio
 * @property string $descripcion
 * @property string $categoria
 * @property string|null $imagen
 * @property string|null $imagen_descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereImagenDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Producto extends Model
{
    /*use HasFactory;*/
    protected $table = 'productos';
    protected $primaryKey = 'producto_id';
    protected $fillable = ['titulo','precio','descripcion','categoria','imagen','imagen_descripcion'];

    public const VALIDAR_CREAR_PRODUCTOS = [
        'titulo' => 'required|min:2',
        'precio' => 'required|numeric|min:0',
        'categoria' => 'required',
        /*'descripcion' => 'required|min:2',
        'alt_imagen' => 'required|min:2',*/
    ];
    public const MENSAJES_PRODUCTOS = [
        'titulo.required' => 'El titulo del producto es obligatorio.',
        'titulo.min' => 'Debes escribir al menos :min caracteres.',
        'precio.required' => 'El precio del producto es obligatorio.',
        'precio.numeric' => 'El precio debe ser un numero.',
        'precio.min' => 'El precio debe ser positivo.',
        'categoria.required' => 'La categoria del producto es obligatoria.',
         /*'descripcion.required' => 'La descripción del equipo es obligatoria.',
        'descripcion.min' => 'Debes escribir al menos :min caracteres.',
        'alt_imagen.required' => 'La descripción de la imagen es obligatoria.',
        'alt_imagen.min' => 'Debes escribir al menos :min caracteres.',*/
    ];

}
