<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	public function up()
	{
		Schema::create('banners', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title')->nullable();
			$table->string('photo')->nullable();
			$table->string('link')->nullable();
			$table->boolean('active')->nullable()->default(true);
			$table->timestamps();
		});
	}
	public function down()
	{
		Schema::drop('banners');
	}
};
