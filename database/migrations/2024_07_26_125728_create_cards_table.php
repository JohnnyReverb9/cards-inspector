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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->unsignedInteger("flat_num");
            $table->string("phone");
            $table->string("alias")->nullable();
            $table->date("expiration");
            $table->string("passport");
            $table->boolean("agreement")->default(false);
            // $table->unsignedInteger("staff_add")->after("agreement");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
