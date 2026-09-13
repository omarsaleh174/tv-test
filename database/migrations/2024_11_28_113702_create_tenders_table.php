<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	 
	public function up()
	{
		Schema::create('tenders', function(Blueprint $table) {	
			$table->id();			// المعرف الرئيسي للجدول
         
			$table->string('tender_code')->nullable(); // رقم المنافسة
            $table->string('title')->nullable(); // موضوع المناقصة
            $table->string('closing_date')->nullable(); // آخر موعد لتقديم العطاء
            $table->string('opening_date')->nullable(); // موعد فتح المظاريف
            $table->string('publisher_name')->nullable(); // اسم الجهة المعلنة
            $table->decimal('bid_docs_price', 10, 2)->nullable(); // قيمة كراسة الشروط
            $table->string('docs_sale_place')->nullable(); // مكان بيع كراسة الشروط
            $table->string('docs_sale_phone')->nullable(); // هاتف مكان بيع كراسة الشروط
            $table->string('reference')->nullable(); // المرجع (المصدر)
            $table->string('website_link')->nullable(); // رابط الموقع الإلكتروني (اختياري)

            $table->unsignedInteger('type')->nullable(); // معرف المدينة
            $table->unsignedInteger('city_id')->nullable(); // معرف المدينة
            // $table->unsignedInteger('category_id')->nullable(); // معرف الفئة
            $table->unsignedInteger('country_id')->nullable(); // معرف الدولة

            $table->foreign('type')->references('id')->on('types')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');

            // إضافة الحقول الأخرى المتعلقة بمكان التقديم
            $table->string('submission_place')->nullable(); // مكان التقديم
            $table->string('phone')->nullable(); // الهاتف
            $table->string('internal_phone')->nullable(); // الهاتف الداخلي
       
            $table->date('publication_date')->nullable(); // تاريخ النشر
            $table->date('send_at')->nullable();

            
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
		Schema::drop('tenders');
	}
};
