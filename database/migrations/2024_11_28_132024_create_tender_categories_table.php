<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderCategoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('tender_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->nullable(); // معرف المدينة
            $table->unsignedBigInteger('tender_id'); // معرف النشاط/الفئة
            $table->foreign('tender_id')->references('id')->on('tenders')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
          $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('tender_categories');
    }
}
