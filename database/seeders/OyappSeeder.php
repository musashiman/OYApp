<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DataTime;

class OyappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("diaries")->insert([
            "body" => "スーパーカップ",
            "date" => now(),
            "image_path" => "random_letters",
            "users_id" => 2,
            "created_at"=> now(),
            "updated_at" => now(),
            "deleted_at" => null,
            ]);
    }
}
