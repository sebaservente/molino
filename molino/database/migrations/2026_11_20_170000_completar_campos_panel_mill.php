<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->string('carta', 20)->default('comidas')->index();
            $table->unsignedInteger('posicion')->default(0);
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->boolean('visible')->default(true)->index();
            $table->unsignedInteger('posicion')->default(0);
        });

        $categoriasCafe = [
            'desayunos y meriendas',
            'desayunos',
            'cafeteria',
            'cosas dulces',
            'dulces',
            'sandwichs',
            'sandwiches',
            'sandwich',
            'huevos revueltos',
            'licuados',
            'promos',
        ];

        $ordenCafe = [
            'cafeteria',
            'desayunos y meriendas',
            'cosas dulces',
            'dulces',
            'huevos revueltos',
            'licuados',
            'promos',
            'sandwichs',
            'sandwiches',
            'bebidas',
        ];

        $ordenComidas = [
            'ensaladas',
            'wraps',
            'omelette / huevos',
            'omelettes',
            'wok',
            'pollo',
            'pastas',
            'polentas',
            'milanesas',
            'platos',
            'plato del dia',
            'postres',
            'bebidas',
        ];

        foreach (DB::table('categorias')->orderBy('categoria_id')->get() as $categoria) {
            $nombre = Str::lower(Str::ascii(trim($categoria->nombre)));

            if ($nombre === 'bebidas') {
                $carta = 'ambas';
            } else {
                $carta = in_array($nombre, $categoriasCafe, true)
                    ? 'cafeteria'
                    : 'comidas';
            }

            $orden = $carta === 'cafeteria'
                ? $ordenCafe
                : $ordenComidas;

            $posicion = array_search($nombre, $orden, true);

            DB::table('categorias')
                ->where('categoria_id', $categoria->categoria_id)
                ->update([
                    'carta' => $carta,
                    'posicion' => $posicion === false
                        ? 100
                        : ($posicion + 1) * 10,
                ]);
        }
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropIndex(['visible']);
            $table->dropColumn(['visible', 'posicion']);
        });

        Schema::table('categorias', function (Blueprint $table) {
            $table->dropIndex(['carta']);
            $table->dropColumn(['carta', 'posicion']);
        });
    }
};
