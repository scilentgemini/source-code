<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->text('website')->nullable()->change();
            $table->text('facebook_link')->nullable()->change();
            $table->text('x_link')->nullable()->change();
            $table->text('linkedin_link')->nullable()->change();
            $table->text('whatsapp_link')->nullable()->change();
            $table->text('google_map_embed_code')->nullable()->change();
            $table->string('file')->nullable()->change();
            $table->string('seo_title')->nullable()->change();
            $table->string('seo_description')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('phone')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->text('website')->nullable(false)->change();
            $table->text('facebook_link')->nullable(false)->change();
            $table->text('x_link')->nullable(false)->change();
            $table->text('linkedin_link')->nullable(false)->change();
            $table->text('whatsapp_link')->nullable(false)->change();
            $table->text('google_map_embed_code')->nullable(false)->change();
            $table->string('file')->nullable(false)->change();
            $table->string('seo_title')->nullable(false)->change();
            $table->string('seo_description')->nullable(false)->change();
        });
    }
};