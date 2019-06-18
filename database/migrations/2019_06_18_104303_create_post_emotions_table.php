<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_emotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id');
            $table->bigInteger('member_id');
            $table->integer('emotion_type');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_emotions', function (Blueprint $table) {
            //
        });
    }
}
