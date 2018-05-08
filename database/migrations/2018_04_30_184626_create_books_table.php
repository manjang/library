<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('review_id')->unsigned();
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('author');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
