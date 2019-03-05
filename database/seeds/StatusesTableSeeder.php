<?php

use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all()->pluck('id');

        $faker = app(Faker\Generator::class);

        $statues = factory(Status::class)->times(200)->make()->each(function ($status) use($faker, $user_ids) {
            $status->user_id = $faker->randomElement($user_ids);
        });

        Status::insert($statues->toArray());
    }
}
