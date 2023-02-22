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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable(); //change later
            $table->unsignedInteger('transaction_id')->nullable();
            $table->string('tnx')->nullable();
            $table->string('description')->nullable();
            $table->double('invest_amount');
            $table->string('type')->nullable(); //change later
            $table->string('method')->nullable();
            $table->integer('already_return_profit')->default(0);
            $table->double('total_profit_amount')->default(0);
            $table->dateTime('last_profit_time')->nullable();
            $table->dateTime('next_profit_time')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
