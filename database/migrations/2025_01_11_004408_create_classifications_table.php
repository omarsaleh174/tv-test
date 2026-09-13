<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	public function up()
	{
		Schema::create('classifications', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title_en')->nullable();
			$table->string('title_ar')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->string('photo')->nullable();
			$table->string('slug_en')->nullable();
			$table->string('slug_ar')->nullable();
			$table->integer('order')->unsigned()->nullable();
            $table->timestamps();
			$table->softDeletes();

		});
	}
	public function down()
	{
		Schema::drop('classifications');
	}
};
