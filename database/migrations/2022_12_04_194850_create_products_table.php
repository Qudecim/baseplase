<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id');
            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('ean', 13)->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('length')->nullable();
            $table->double('price')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
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
};
