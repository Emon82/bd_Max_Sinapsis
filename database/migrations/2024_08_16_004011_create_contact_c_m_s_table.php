<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->text('sub_description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('link_url')->nullable();
            $table->timestamps();
        });

        DB::table('contact_c_m_s')->insert([
            // Landing Page ................................................................
            // Mobile one
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            //
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Expert Preception Network
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Ready to Start
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Connect Member
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Success
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Header
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Mobile one
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            //
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Expert Preception Network
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Ready to Start
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Connect Member
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Success
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Header
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_c_m_s');
    }
};
