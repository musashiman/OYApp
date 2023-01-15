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
        DB::table("oyapps")->insert([
            "body" => "スーパーカップ",
            "image" => "画像のURLを記載する",
            "users_id" => 1,
            "created_at"=> now(),
            "updated_at" => now(),
            "deleted_at" => null,
            ]);
    }
}
