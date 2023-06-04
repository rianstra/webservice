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
        schema::create('customer', function(Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->string('phone',15);
            $table->string('email',50);
            $table->string('address',200);
            $table->timestamps();
            


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfexists('custemers');
    }
};
