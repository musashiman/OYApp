<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snapshots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->comment("ユーザーID");
            $table->unsignedBigInteger("diary_id")->comment("DiaryのID");
            
            $table->string("comment")->comment("内容");
            $table->string("image_path");
            $table->timestamps();
            
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("diary_id")->references("id")->on("diaries");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snapshots');
    }
};
