<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePromoCodeUsagesForClientsTable extends Migration
{
    public function up()
    {
        Schema::table('promo_code_usages', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->unsignedInteger('client_id')->after('promo_code_id');
            $table->string('email')->after('client_id');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');

            // نفس العميل لا يستخدم نفس البرومو مرتين
            $table->unique(
                ['promo_code_id', 'client_id'],
                'promo_client_unique'
            );

            // نفس الإيميل لا يستخدم نفس البرومو مرتين
            $table->unique(
                ['promo_code_id', 'email'],
                'promo_email_unique'
            );
        });
    }

    public function down()
    {
        Schema::table('promo_code_usages', function (Blueprint $table) {

            $table->dropUnique('promo_client_unique');
            $table->dropUnique('promo_email_unique');

            $table->dropForeign(['client_id']);

            $table->dropColumn([
                'client_id',
                'email'
            ]);

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
        });
    }
}