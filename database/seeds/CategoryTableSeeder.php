<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create([
            'title' => 'Categoria 1',
            'url_clean' => 'categoria_1'
        ]);

        for ($i=2; $i <= 20; $i++) { 
            Category::create([
                'title' => "Categoria $i",
                'url_clean' => "categoria_$i"
            ]);
        }

    }
}
