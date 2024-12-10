<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('location', 255);
            $table->string('contact_number', 20)->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cinemas');
    }    
};
