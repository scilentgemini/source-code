<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['location_id']);
            
            // Make the column nullable and add the foreign key constraint that allows null
            $table->foreignId('location_id')->nullable()->change();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['location_id']);
            
            // Restore the non-nullable foreign key constraint
            $table->foreignId('location_id')->nullable(false)->change();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }
};