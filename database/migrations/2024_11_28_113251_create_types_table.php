<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	
	public function up()
	{
		Schema::create('types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title_en')->nullable();
			$table->string('title_ar')->nullable();
			$table->boolean('active')->nullable()->default(1);
            $table->timestamps();
			$table->softDeletes();
		});
	}

	
	public function down()
	{
		Schema::drop('types');
	}
};
