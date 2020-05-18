<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('genre')->nullable();
            $table->string('publishing')->nullable();
            $table->string('year')->nullable();
            $table->integer('ISBN')->unique();
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->timestamps();

        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('author_id')
                  ->references('id')
                  ->on('authors');
        });
    }
}
