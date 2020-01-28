<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['Tech','Social','Startup','Business','World'];
        $tag = ['Laravel','PHP','DB','C++','Java'];
        $k = array_rand($category);
        $i = array_rand($tag);
        $faker = Faker::create();
        foreach (range(1,14) as $index) {
            $title=$faker->sentence($nbWords = 6, $variableNbWords = true);
            DB::table('posts')->insert([
                'user_id' => 4,
                'title' => $title,
                'description' => $faker->text($maxNbChars = 200) ,
                'gitSource' => $faker->url                     ,
                'category' => $category[$k],
                'slug' => Str::slug($title,'_'),
                'url' => $faker->url,
                'tag' => $tag[$i],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
