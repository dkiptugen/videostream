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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->morphs('contentable');
            $table->string('title');
            $table->longText('description');
            $table->string('thumbnail_url');
            $table->string('content_url')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('country');
            $table->string('language');
            $table->string('content_type');
            $table->unsignedBigInteger('user_id');
            $table->string('format_type');
            $table->bigInteger('duration')->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_premium')->default(false);
            $table->boolean('is_geopolled')->default(false);
            $table->json("geo_data")->nullable();
            $table->unsignedBigInteger('category_id');
            $table->bigInteger('views');
            $table->json('content_metadata');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
