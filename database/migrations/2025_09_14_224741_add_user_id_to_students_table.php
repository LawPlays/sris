<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Add user_id column ONLY if it doesn't exist yet
            if (!Schema::hasColumn('students', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id')->nullable();

                // Add FK constraint pointing to users(id)
                $table->foreign('user_id')
                      ->references('id')->on('users')
                      ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop FK if exists
            if (Schema::hasColumn('students', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
