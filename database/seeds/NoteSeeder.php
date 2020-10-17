<?php

use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 1)->create()->each(function ($user) {
            $user->notes()->saveMany(factory(App\Note::class,10)->make());
        });
    }
}
