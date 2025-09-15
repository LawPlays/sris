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
        Schema::table('students', function (Blueprint $table) {
            // Add user_id column after id
            $table->unsignedBigInteger('user_id')->after('id')->nullable();

            // Setup foreign key constraint to users table
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['user_id']);
            
            // Then drop the column
            $table->dropColumn('user_id');
        });
    }
};
