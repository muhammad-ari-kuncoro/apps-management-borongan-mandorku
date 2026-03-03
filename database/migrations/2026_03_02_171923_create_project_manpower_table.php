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
        Schema::create('project_manpower', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->string('full_name');
            $table->string('no_phone');
            $table->text('address');
            $table->string('gender');
            $table->string('spesialist');
            $table->string('age');
            $table->date('join_date');
            $table->date('terminate_date')->nullable();
            $table->decimal('daily_rate',15, 2);
            $table->enum('status',['active', 'inactive', 'terminate'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_manpower');
    }
};
