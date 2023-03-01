<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Following;

class FollowingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $following_data= [
                ["user_id" =>1,"following_user_id" =>3],
                ["user_id" =>2,"following_user_id" =>3],
                ["user_id" =>3,"following_user_id" =>1],
            ];
            
            foreach($following_data as $following_value)
            {
                $following = new \App\Models\Following();
                $following->user_id = $following_value['user_id'];
                $following->following_user_id = $following_value['following_user_id'];
                $following->save();
            }
    }
}
