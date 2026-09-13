<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	 
	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable(); // اسم الشركة
            $table->string('name')->nullable(); // اسم الشخص المسؤول
            $table->string('phone')->nullable(); // الهاتف
            $table->string('phone_2')->nullable(); // هاتف إضافي
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('password')->nullable(); // كلمة المرور
            $table->string('whatsapp')->nullable(); // رقم الواتساب
			$table->unsignedInteger('subscription_id')->nullable(); // معرف الاشتراك
            $table->date('start_subscription')->nullable(); // تاريخ بداية الاشتراك
            $table->date('end_subscription')->nullable(); // تاريخ نهاية الاشتراك
            $table->boolean('active')->nullable()->default(true); // حالة الحساب (نشط / غير نشط)
            $table->string('photo')->nullable(); // صورة الشركة
            $table->string('type')->nullable()->default(1); // نوع الشركة أو المستخدم (إن كان لديه نوع معين)
            $table->string('device_token')->nullable(); // رمز الجهاز للاتصالات
			$table->unsignedInteger('country_id')->nullable(); // معرف الدولة
			$table->unsignedInteger('city_id')->nullable(); // معرف المدينة
			$table->tinyInteger('gender')->nullable()->default(1);
            $table->rememberToken();
	    $table->timestamp('email_verified_at')->nullable();
	    $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('set null');
            $table->timestamps();
			$table->softDeletes();
		});
	}
 
	public function down()
	{
		Schema::drop('clients');
	}
};
