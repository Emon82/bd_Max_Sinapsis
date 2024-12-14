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
        {
            Schema::create('projects', function (Blueprint $table) {
                $table->id(); // Auto-incrementing primary key
                $table->integer('position')->nullable(); 
                $table->string('title_EESS')->index();
                $table->string('title_IINN')->index();
                $table->string('location_EESS')->index();
                $table->string('location_IINN')->index();
                $table->text('description_EESS')->index();
                $table->text('description_IINN')->index();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
