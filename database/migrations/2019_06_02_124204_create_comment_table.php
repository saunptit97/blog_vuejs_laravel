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
         if (!Schema::hasTable('comment')) {
            Schema::create('comment', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('content');
                $table->unsignedInteger('id_post');
                $table->foreign('id_post')->references('id')->on('post');
                $table->unsignedInteger('id_user');
                $table->foreign('id_user')->references('id')->on('user');
                $table->timestamps();
            });
        }
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
