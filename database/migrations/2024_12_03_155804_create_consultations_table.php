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
		Schema::create('consultations', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedInteger('consultant_id')->nullable();
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');
			$table->unsignedInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

			
			$table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->text('message')->nullable();
            $table->string('title')->nullable();
            $table->date('send_at')->nullable();

            $table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('consultations');
	}
};
