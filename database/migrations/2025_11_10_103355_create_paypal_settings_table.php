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
        Schema::create('paypal_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->comment('1=Enable, 0=Disable');
            $table->boolean('mode')->comment('0=SandBox, 1=Live');
            $table->string('country_name');
            $table->string('currency_name');
            $table->double('currency_rate');
            $table->text('client_id');
            $table->text('secret_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paypal_settings');
    }
};
