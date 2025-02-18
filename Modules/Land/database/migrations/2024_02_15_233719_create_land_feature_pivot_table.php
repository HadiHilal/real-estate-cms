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
        Schema::create('land_feature_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_id')->constrained('lands');
            $table->foreignId('land_feature_id')->constrained('land_features');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_feature_pivot');
    }
};
