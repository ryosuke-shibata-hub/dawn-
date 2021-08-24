<?php

use App\Post;
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
        //
        for ($i = 1; $i <= 10; $i++) {
            post::create([
                'user_id' => $i,
                'posts' => 'ねむい' .$i,
                'created_at' => now(),
                'updated_at' =>now()
            ]);
        }
    }
}
