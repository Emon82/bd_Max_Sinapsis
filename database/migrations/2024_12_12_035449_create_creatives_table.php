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
        Schema::create('creatives', function (Blueprint $table) {
            $table->id();
            $table->string('title_EESS')->index();
            $table->string('title_IINN')->index();
            $table->string('sub_title_EESS')->nullable()->index();
            $table->string('sub_title_IINN')->nullable()->index();
            $table->string('image')->nullable()->index();
            $table->text('content_EESS')->index();
            $table->text('content_IINN')->index();
            $table->string('image_position')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creatives');
    }
};
