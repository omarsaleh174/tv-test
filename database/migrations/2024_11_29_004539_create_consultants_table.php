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
		Schema::create('consultants', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name')->nullable();
			$table->string('title')->nullable();
			$table->date('birth_date')->nullable();
			$table->text('small_description')->nullable();			
			$table->text('long_description')->nullable();
			$table->text('services')->nullable();
			$table->text('skills')->nullable();
			$table->string('photo')->nullable();
			$table->unsignedInteger('city_id')->nullable(); // معرف المدينة
            $table->unsignedInteger('country_id')->nullable(); // معرف الدولة
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
			$table->unsignedInteger('department_id')->nullable(); // معرف المدينة
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
			$table->unsignedInteger('client_id')->nullable(); // معرف المدينة
		
            $table->string('phone')->nullable(); // الهاتف
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('password')->nullable(); // كلمة المرور
            $table->string('whatsapp')->nullable(); // رقم الواتساب
            $table->string('device_token')->nullable(); // رمز الجهاز للاتصالات
			$table->timestamps();
			$table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consultants');
	}
};
