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
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('category');
            $table->string('image');
            $table->unsignedBigInteger('sizes');
            $table->double('price');
            $table->string('description');
            $table->boolean('is_active')->default(1);
            // foreign key
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('sizes')->references('id')->on('sizes');
            $table->timestamps();
            //Indexes
            $table->index('category');
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
