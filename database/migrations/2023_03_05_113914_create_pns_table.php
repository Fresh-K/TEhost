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
        Schema::create('pns', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('l1');
            $table->integer('l2')->nullable();
            $table->integer('l3')->nullable();
            $table->integer('l4')->nullable();
            $table->integer('l5')->nullable();
            $table->integer('l6')->nullable();
            $table->integer('t1');
            $table->integer('t2')->nullable();
            $table->integer('t3')->nullable();
            $table->integer('t4')->nullable();
            $table->integer('t5')->nullable();
            $table->integer('t6')->nullable();
            $table->integer('t1m');
            $table->integer('t2m')->nullable();
            $table->integer('t3m')->nullable();
            $table->integer('t4m')->nullable();
            $table->integer('t5m')->nullable();
            $table->integer('t6m')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pns');
    }
};
