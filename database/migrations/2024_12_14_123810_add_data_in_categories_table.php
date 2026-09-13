<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataInCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('is_visible_on_home')->default(false);
        });

        Schema::table('consultants', function (Blueprint $table) {
            $table->boolean('is_visible_on_home')->default(false);
            $table->integer('order')->nullable();  
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->boolean('is_visible_on_home')->default(false);
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('is_visible_on_home');
        });
        Schema::table('consultants', function (Blueprint $table) {
            $table->dropColumn('is_visible_on_home');
            $table->dropColumn('order');
        });
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->dropColumn('is_visible_on_home');
        });
    }
}
