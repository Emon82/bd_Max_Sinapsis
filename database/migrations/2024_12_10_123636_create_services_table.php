<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
        {
            Schema::create('services', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->string('title_eess')->index();
                $table->string('title_iinn')->index();
                $table->text('description_eess')->index();
                $table->text('description_iinn')->index();
                $table->timestamps(); // Created at and Updated at
            });
        }
    
        public function down()
        {
            Schema::dropIfExists('services');
        }
    };
