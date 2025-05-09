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
        Schema::create('introletter', function (Blueprint $table) {
            $table->id();
            $table->foreignId("member_id")->constrained("members")->cascadeOnDelete();
            $table->string("file_number");
            $table->string("date_of_applying");
            $table->string("martial_status");
            $table->string("city_country");
            $table->string("membership_status");
            $table->string("country_code")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('introletter');
    }
};
