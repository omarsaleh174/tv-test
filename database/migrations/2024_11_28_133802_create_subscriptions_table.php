<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	 
	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title')->nullable(); // نوع الاشتراك (شهري، ربع سنوي، سنوي)
            $table->text('description')->nullable(); // نوع الاشتراك (شهري، ربع سنوي، سنوي)
            $table->string('subscription_type')->nullable(); // نوع الاشتراك (شهري، ربع سنوي، سنوي)
            $table->string('type_amount')->nullable(); // نوع الاشتراك (شهري، ربع سنوي، سنوي)
            $table->tinyInteger('duration')->nullable(); // مدة الاشتراك بالأشهر (مثال: 1، 3، 12)
            $table->tinyInteger('status')->nullable()->default(1); // حالة الاشتراك
			$table->decimal('price', 10, 2)->nullable(); // المبلغ المدفوع
			$table->decimal('real_price', 10, 2)->nullable(); // المبلغ المدفوع
            $table->timestamps();
			$table->softDeletes();
		});
	}
 
	public function down()
	{
		Schema::drop('subscriptions');
	}
};
