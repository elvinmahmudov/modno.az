<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->boolean('is_shown')->default(false);
            $table->integer('old_price')->nullable();
            $table->integer('price');
            $table->string('folder');
            $table->unsignedInteger('likes')->nullable();
            $table->unsignedInteger('dislikes')->nullable();
            $table->float('rating')->nullable();
            $table->integer('sale_percent')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('user_id')->unsigned();
            $table->integer('ordered')->unsigned()->nullable();
            $table->integer('trending')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('images')->nullable();
            $table->string('cover_image');
            $table->longText('note')->nullable();
            $table->longText('url')->nullable();
            $table->longText('options')->nullable();
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
        Schema::dropIfExists('products');
    }
}
