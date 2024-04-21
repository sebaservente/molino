<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categorias')->insert([
            [
                'categoria_id' => 1,
                'nombre' => 'Desayunos y Meriendas',
                'abreviatura' => 'DES',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 2,
                'nombre' => 'Cafeteria',
                'abreviatura' => 'CAF',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 3,
                'nombre' => 'Bebidas',
                'abreviatura' => 'BEB',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 4,
                'nombre' => 'Ensaladas',
                'abreviatura' => 'ENS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 5,
                'nombre' => 'Platos',
                'abreviatura' => 'PLA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'categoria_id' => 6,
                'nombre' => 'Plato del Día',
                'abreviatura' => 'DIA',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
