<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class TestUserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $test1 =[
                "name" => "太郎",
                "email" => "taro@example.com",
                "password" =>"Tarotaro" ,
            ];
        $test2 = [
                "name"=> "次郎",
                "email" =>"jiro@example.com",
                "password" =>"Jirojiro",
            ];    
        $test3 = [
                "name"=>"三郎",
                "email" =>"saburo@example.com",
                "password" =>"SaburoSaburo",
            ];
        DB::table('users')->insert($test1);
        DB::table("users")->insert($test2);
    }
}
