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
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->unsignedBigInteger('user_id')->nullable();

        //     $table->foreign('user_id')->references('id')->on('users');
        // });
        
    
        Schema::table('posts', function (Blueprint $table) {
            $table->string('posted_by')->nullable();

        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
