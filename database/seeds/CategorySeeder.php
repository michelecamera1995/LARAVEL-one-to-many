<?php

use Illuminate\Database\Seeder;
use App\CategoryModel;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Gossip', 'Casa', 'Notizie', 'Guide', 'Salute'];

        foreach ($categories as $category) {
            $new_category = new CategoryModel();
            $new_category->name = $category;
            $new_category->slug = Str::slug($category);
            $new_category->save();
        }
    }
}
