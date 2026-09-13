<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientIdInTenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            
        });
    }
 
    public function down()
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->dropColumn('client_id');
            $table->dropColumn('approved_by');
        });
    }
}
