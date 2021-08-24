<?php
use App\follows;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 10; $i++) {
            Follows::create([
                'follow' => $i,
                'follower' => 1
            ]);
        }
    }
}
