<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('image')->nullable();
            $table->string('sub_title_one_ar')->nullable();
            $table->string('sub_title_one_en')->nullable();
            $table->text('sub_description_one_ar')->nullable();
            $table->text('sub_description_one_en')->nullable();
             $table->string('sub_title_two_ar')->nullable();
            $table->string('sub_title_two_en')->nullable();
            $table->text('sub_description_two_ar')->nullable();
            $table->text('sub_description_two_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
