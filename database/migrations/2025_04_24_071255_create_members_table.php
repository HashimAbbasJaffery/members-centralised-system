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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->enum("gender", ["male", "female"]);
            $table->string("nationality")->nullable();
            $table->date("dob");
            $table->string("passport");
            $table->string("cnic");
            $table->string("adress");
            $table->string("city");
            $table->string("email");
            $table->string("mobile");
            $table->string("profession");
            $table->string("position");
            $table->string("organization");
            $table->string("income");
            $table->string("clubs1")->nullable();
            $table->string("clubs2")->nullable();
            $table->string("clubs3")->nullable();
            $table->string("clubs4")->nullable();
            $table->text("seeking");
            $table->enum("applying", ["yes", "no"]);
            $table->string("img")->nullable();
            $table->date("current");
            $table->string("unique_key");
            $table->string("status");
            $table->foreignId("membership_id")->constrained("memberships")->cascadeOnDelete();
            $table->string("membership_number")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
