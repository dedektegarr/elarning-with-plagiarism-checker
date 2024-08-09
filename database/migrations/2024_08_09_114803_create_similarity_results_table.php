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
        Schema::create('similarity_results', function (Blueprint $table) {
            $table->id('similarity_result_id');
            $table->unsignedBigInteger('submission_id');
            $table->unsignedBigInteger('compared_submission_id');
            $table->float('cosim_result', 15, 10);
            $table->timestamps();

            $table->foreign('submission_id')->references('submission_id')->on('submissions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('compared_submission_id')->references('submission_id')->on('submissions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('similarity_results');
    }
};
