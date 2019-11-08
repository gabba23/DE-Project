<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'title' => 'post',
            'timesaday' => '2 times a day, morning and evening',
            'beforeafter' => 'before',
            'daysleft' => '3',
            'user_id' => '1',
        ]);
        $post->save();

        $post = new \App\Post([
            'title' => 'post2',
            'timesaday' => '2 times a day, morning and evening',
            'beforeafter' => 'after',
            'daysleft' => '1',
            'user_id' => '2',
        ]);
        $post->save();
    }
}
