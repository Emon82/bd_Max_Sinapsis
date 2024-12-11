<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title_EESS');
            $table->string('title_IINN');
            $table->json('images'); // Store images as JSON
            $table->string('sub_Title_EESS');
            $table->string('sub_Title_IINN');
            $table->text('sub_desc_EESS');
            $table->text('sub_desc_IINN');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
};