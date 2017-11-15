<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comment', function (Blueprint $table) {
          $table->increments('id');
          $table->text('comment');
          $table->unsignedInteger('owner');
          $table->unsignedInteger('news_id');
          $table->unsignedInteger('commentlikes')->default(0);
          $table->foreign('owner')->references('id')->on('users');
          $table->foreign('news_id')->references('id')->on('news')->onDelete("cascade");
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
        Schema::dropIfExists('comment');
    }
}
