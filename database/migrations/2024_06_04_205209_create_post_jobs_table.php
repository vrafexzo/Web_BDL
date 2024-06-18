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
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('idJob')->unique();
            $table->string('companyName');
            $table->string('jobtitle');
            $table->string('requirements');
            $table->string('salary');
            $table->date('dateopened');
            $table->date('dateexpired');
            $table->string('status')->default('pending');
            $table->timestamps();
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_jobs');
    }
};
