<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryClientTable extends Migration
{
    public function up()
    {
        Schema::create('category_client', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('category_client');
    }
}
