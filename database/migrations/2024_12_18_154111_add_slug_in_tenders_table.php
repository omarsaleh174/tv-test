<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugInTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });
        Schema::table('consultants', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

    }
 
    public function down()
    {
        Schema::table('tenders', function (Blueprint $table) {
           $table->dropColumn('slug');
        });
        Schema::table('consultants', function (Blueprint $table) {
            $table->dropColumn('slug');
         });
    }
}
