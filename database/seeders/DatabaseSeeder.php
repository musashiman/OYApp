<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private const SEEDERS = [
            // TestUserCreateSeeder::class,
            FollowingsTableSeeder::class,
        ] ;
    
    public function run()
    {
    
        foreach(self::SEEDERS as $seeder){
            $this->call($seeder);
        }
        
        // $this->call(TestUserCreateSeeder::class);
        // $this->call(FollowingsTableSeeder::class);
    }
}
