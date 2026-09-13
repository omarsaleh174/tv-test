<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {

            $table->id();

            $table->string('code')->unique();

            $table->integer('discount_percentage');

            $table->integer('max_usage');

            $table->integer('used_count')->default(0);

            $table->timestamp('expires_at');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promo_codes');
    }
}