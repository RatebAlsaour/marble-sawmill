<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('client_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientInvoice_id')->references('id')->on('client_invoices')->onDelete('cascade');
            $table->string('block_symbol');
            $table->integer('height');
            $table->integer('width');
            $table->integer('high');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_invoice_details');
    }
};
