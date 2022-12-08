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
        //Book::factory(20)->create();

        //通常のPHP
        // $user = new User();
        // $user->name = "尾崎";
        // $user->email = "ozaki@sozosha.ac.jp";
        // $user->password = bcrypt("rootozaki");
        // $user->save();

        User::factory(10)->create()->each(function($user){
            Book::factory(random_int(3,5))->create([
                'user_id'=>$user->id,//user_idを上書きする
            ]);
        });

        //Eloquentモデル経由
        // User::create([
        //     "name"=>"尾崎卓治",
        //     "email"=>"ozaki@sozosha.ac.jp",
        //     "password"=>bcrypt("rootozaki"),
        // ]);

        User::all()->first()->update([
            "name"=>"尾崎卓治",
            "email"=>"ozaki@sozosha.ac.jp",
            "password"=>bcrypt("rootozaki"),
        ]);


    }
}
