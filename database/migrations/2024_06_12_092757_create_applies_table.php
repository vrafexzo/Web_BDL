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
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->string('idApply')->unique();
            $table->unsignedBigInteger('idJob');
            $table->unsignedBigInteger('idUser');
            $table->string('name');
            $table->string('address');
            $table->date('birthDate');
            $table->string('email');
            $table->string('noHp');
            $table->string('cv');
            $table->string('status')->default('Processed');
            $table->timestamps();

            $table->index('idJob');
            $table->index('idUser');
            $table->foreign('idJob')->references('id')->on('post_jobs')->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**B
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applies', function (Blueprint $table) {
            $table->dropForeign(['idJob']);
            $table->dropForeign(['idUser']);
        });

        Schema::dropIfExists('applies');
    }
};
