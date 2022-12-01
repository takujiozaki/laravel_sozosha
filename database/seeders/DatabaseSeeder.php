<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Book::factory(5)->create();
        User::factory(10)->create()->each(function($user){
            Book::factory(random_int(3,5))->create([
                'user_id'=>$user->id,//user_idを上書きする
            ]);
        });

        User::first()->update([
            'name'=> 'オザキタクジ',
            'email'=> 'takujiozaki@gmail.com',
            'password'=> bcrypt('abcd1234'),
        ]);
    }
}
