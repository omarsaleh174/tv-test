<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
            $table->increments('id');

			$table->text('desc_en')->nullable();
            $table->text('desc_ar')->nullable();
            $table->string('photo')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_ar')->nullable();
            $table->string('sub_desc_en')->nullable();
            $table->string('sub_desc_ar')->nullable();
            $table->integer('display_order')->nullable();
            $table->tinyInteger('type')->default(1)->nullable();
            $table->boolean('active')->nullable()->default(true);
			$table->text('tags_en')->nullable();
			$table->text('tags_ar')->nullable();
            $table->unsignedInteger('classification_id')->nullable();
            $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('cascade');
            $table->unsignedInteger('consultant_id')->nullable();
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');

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
		Schema::drop('articles');
	}
};
