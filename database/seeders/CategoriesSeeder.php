<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Men', 'Women', 'Kids'];
        for($i = 0; $i < 3; $i++):
            DB::table('categories')->insert([
                'name' => $names[$i],
                'slug' =>  Str::slug($names[$i]),
                'slogan' => "What $names[$i] Needs",
                'created_at' => now(),
                'updated_at' => now()
            ]);
        endfor;
    }
}
