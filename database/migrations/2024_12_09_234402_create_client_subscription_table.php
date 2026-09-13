<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateClientSubscriptionTable extends Migration
{
    public function up()
    {
        Schema::create('client_subscription', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('subscription_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
            $table->tinyInteger('duration')->nullable(); 
			$table->decimal('real_price', 10, 2)->nullable(); 



            $table->integer('InvoiceId')->nullable();       // patment id
            $table->string('InvoiceStatus')->nullable();    //patment Paid or Not
            $table->boolean('IsSuccess')->nullable()->default(false);       // true
            $table->integer('InvoiceValue')->nullable();    // price from payment
            $table->text('InvoiceURL')->nullable();       //patment  url
            $table->string('TransactionDate')->nullable();// date

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('client_subscription');
    }
}
