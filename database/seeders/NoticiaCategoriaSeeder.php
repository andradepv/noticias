<?php

namespace Database\Seeders;

use App\Models\CategoriaNoticia;
use Illuminate\Database\Seeder;

class NoticiaCategoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaNoticia::create([
        'noticia_id' => /*id da noticia que deseja */ 1,
        'categoria_id' => 2
        ]);
    }
}
