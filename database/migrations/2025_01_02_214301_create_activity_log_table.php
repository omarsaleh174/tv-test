<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogTable extends Migration
{
    public function up()
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->uuid('batch_uuid')->nullable(); // The batch UUID (optional, you can use it for grouping logs)
            $table->string('event'); // Store the type of event (e.g., 'created', 'updated', etc.)
            $table->morphs('subject'); // This creates subject_id and subject_type (Polymorphic relation)
            $table->foreignId('causer_id')->nullable()->constrained('users')->onDelete('set null'); // The ID of the causer (user or entity performing the action)
            $table->string('causer_type')->nullable(); // The type of the causer (the model name, e.g., App\Models\User)
            $table->text('description'); // The description of the activity
            $table->json('properties')->nullable(); // Additional data (properties) related to the activity
            $table->string('log_name')->nullable(); // The log name (optional, you can use it to differentiate types of logs)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_log');
    }
}
