<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->text('sub_description')->nullable();
            $table->string('button_text')->nullable();
            $table->longText('link_url')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });

        DB::table('c_m_s')->insert([
            // Landing Page ................................................................
            // banner
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Value
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

            //About Us Page................................................................

            // banner
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Mission
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Vission
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Values
            ['title' => null, 'created_at' => now(), 'updated_at' => now()],
            // Expert Preception Network
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
        Schema::dropIfExists('c_m_s');
    }
};
