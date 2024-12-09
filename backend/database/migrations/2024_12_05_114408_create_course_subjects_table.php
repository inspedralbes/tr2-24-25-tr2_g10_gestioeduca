<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    if (!Schema::hasTable('course_subjects')) {
        Schema::create('course_subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->timestamps();
        });
    }
}


    public function down(): void
    {
        Schema::dropIfExists('course_subjects');
    }
};
