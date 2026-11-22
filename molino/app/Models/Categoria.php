<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'categoria_id';
    protected $fillable = ['nombre', 'abreviatura', 'carta', 'posicion'];
    protected $casts = ['posicion' => 'integer'];

    public const CARTAS = ['cafeteria' => 'Cafetería y meriendas', 'comidas' => 'Comidas', 'ambas' => 'Ambas cartas'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id', 'categoria_id');
    }
}
