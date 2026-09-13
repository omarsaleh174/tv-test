<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodeUsagesTable extends Migration
{
    public function up()
    {
        Schema::create('promo_code_usages', function (Blueprint $table) {

            $table->id();

            $table->foreignId('promo_code_id')
                  ->constrained('promo_codes')
                  ->onDelete('cascade');

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promo_code_usages');
    }
}