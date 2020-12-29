<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->bigInteger('user_id')->index()->unsigned(); 
            // 建議設定user_id 一行
            $table->unsignedBigInteger('user_id');
            // nullable 可以不填
            $table->string('title')->nullable();
            // 這個部分用 text?
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();

            
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
