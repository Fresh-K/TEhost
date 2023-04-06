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
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->string('validation_type');
            $table->string('Line');
            $table->integer('l1m');
            $table->integer('l2m')->nullable();
            $table->integer('l3m')->nullable();
            $table->integer('l4m')->nullable();
            $table->integer('l5m')->nullable();
            $table->integer('l6m')->nullable();
            $table->unsignedBigInteger('po_id')->nullable();
            $table->foreign('po_id')->references('id')->on('p_o_s')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('inspector_id');
            $table->foreign('inspector_id')->references('id')->on('lineinspectors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('image');
            $table->string('Visual_check');
            $table->string('marquage_étiquettes');
            $table->string('qip');
            $table->string('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieces');
    }
};
