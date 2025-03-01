<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->integer('age');
            $table->decimal('cash', 8, 2);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
