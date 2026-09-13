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
		Schema::create('countries', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title_en')->nullable();
			$table->string('title_ar')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->string('photo')->nullable();
            $table->timestamps();
			$table->softDeletes();
		});
	}


	public function down()
	{
		Schema::drop('countries');
	}
};
