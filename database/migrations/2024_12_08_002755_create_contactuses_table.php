<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

	public function up()
	{
		Schema::create('contactuses', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('subject')->nullable();
			$table->text('message')->nullable();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contactuses');
	}
};
