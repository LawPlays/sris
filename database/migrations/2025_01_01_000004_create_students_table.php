<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('lrn')->nullable(); // optional
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('strand_id')->nullable()->constrained('strands')->nullOnDelete();
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('students');
    }
};
