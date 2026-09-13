<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
		Schema::create('parts', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title')->nullable();
			$table->string('key')->nullable();
			$table->text('value_en')->nullable();
			$table->text('value_ar')->nullable();
            // $table->string('type')->nullable();
            // $table->string('section')->nullable();
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
		Schema::drop('parts');
	}
};
