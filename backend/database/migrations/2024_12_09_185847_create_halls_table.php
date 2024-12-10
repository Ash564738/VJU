<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cinema_id')->constrained()->onDelete('cascade');
            $table->string('name', 100);
            $table->integer('total_seats');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('halls');
    }    
};
