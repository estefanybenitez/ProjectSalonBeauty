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
        Schema::create('service', function (Blueprint $table) {
            $table->id('id_service');
            $table->string('name_service',50);
            $table->string('timeframe',5);
            $table->string('img');
            $table->string('description');
            $table->double('precio');
            $table->bigInteger('fk_category')->unsigned();
            $table->foreign('fk_category')->references('id_category')->on('category')
            ->onDelete('cascade')
             ->onUpdate('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
