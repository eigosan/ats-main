<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('job_position')->nullable(false);
            $table->string('additional_info')->nullable();
            $table->json('education')->nullable();  // Store multiple education entries as JSON
            $table->json('work_experience')->nullable(); // Store multiple work experience entries as JSON
            $table->text('skills')->nullable(); // Text field for skills input
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_forms');
    }
};
