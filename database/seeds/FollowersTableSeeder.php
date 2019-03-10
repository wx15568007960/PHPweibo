<?php

use App\Models\User;
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
        $users = User::all();

        $user = $users->first();

        foreach ($users as $follower) {
            if ($user->id === $follower->id) {
                continue;
            }

            $follower->follow($user->id);
        }
    }
}
