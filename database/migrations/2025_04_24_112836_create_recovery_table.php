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
        Schema::create('recovery', function (Blueprint $table) {
            $table->id();
            $table->foreignId("member_id")->constrained()->cascadeOnDelete();
            $table->string("alt_phone_number");
            $table->string("level");
            $table->string("membership_type");
            $table->string("membership_number");
            $table->string("installment_months");
            $table->string("file_number");
            $table->string("form_fee");
            $table->string("processing_fee");
            $table->string("first_payment");
            $table->string("total_installment");    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recovery');
    }
};
