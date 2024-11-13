<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_filtered_resumes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilteredResumesTable extends Migration
{
    public function up()
    {
        Schema::create('filtered_resumes', function (Blueprint $table) {
            $table->id();
            // Modify the foreign key to reference the correct table and column
            $table->foreignId('unfiltered_resume_id')
                ->constrained('application_forms') // Reference the correct table here
                ->onDelete('cascade');
            $table->string('job_position');
            $table->json('education');
            $table->json('work_experience');
            $table->text('skills');
            $table->text('cleaned_resume_text');
            $table->float('nlp_score')->nullable();
            $table->float('knn_score')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('filtered_resumes');
    }
}
