<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_invoice_id')->constrained();
            $table->string('black_symbol');
            $table->integer('height');
            $table->integer('width');
            $table->integer('high');
            $table->double('weight');
            $table->string('quality')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_invoice_details');
    }
};
