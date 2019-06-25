<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if (!Schema::hasTable('post')) {
            Schema::create('post', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->string('description');
                $table->string('content');
                $table->integer('view')->default(0);
                $table->integer('like')->default(0);
                $table->unsignedInteger('id_category');
                $table->foreign('id_category')->references('id')->on('category');
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
        Schema::dropIfExists('post');
    }
}
