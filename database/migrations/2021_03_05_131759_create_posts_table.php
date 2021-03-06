<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mountain_id')->references('id')->on('mountains')
            ->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->string('title', 30);
            $table->text('article');
            $table->datetime('climbing_time');
            $table->datetime('downhill_time');
            $table->boolean('alert_flag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
