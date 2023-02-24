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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index(); // required
            $table->string('type')->index()->comment('supplier|client|managerial'); // required
            $table->string('email'); // required
            $table->string('mobile', 25)->nullable()->unique()->index(); // required
            $table->enum('gender', ['male', 'female'])->index()->nullable(); // remove it
            $table->string('password')->nullable(); // required
            $table->rememberToken(); // required
            $table->nullableMorphs('resource'); // require
            $table->integer('is_verified')->default(0)->index(); // remove it
            $table->timestamp('verified_at')->nullable()->index(); // remove it
            $table->string('verification_code')->nullable()->index(); // remove it
            $table->boolean('is_blocked')->default(0)->index(); // remove it
            $table->timestamp('blocked_at')->nullable(); // remove it
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
        Schema::dropIfExists('users');
    }
};
