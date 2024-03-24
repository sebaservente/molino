<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
              'producto_id' => 1,
              'titulo' => 'Cafe con leche + tostadas, queso y mermelada',
              'precio' => 2000,
              'descripcion' => 'Cafe con leche + tostadas, queso y mermelada',
              'categoria' => 'desayunos',
              'imagen' => null,
              'imagen_descripcion' => null,
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
                'producto_id' => 2,
                'titulo' => 'Cafe con leche + dos medialunas',
                'precio' => 1600,
                'descripcion' => 'Cafe con leche + dos medialunas',
                'categoria' => 'cafeteria',
                'imagen' => null,
                'imagen_descripcion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
