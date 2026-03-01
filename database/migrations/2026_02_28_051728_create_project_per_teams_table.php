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
        Schema::create('project_per_teams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->foreign("project_id")->references("id")->on("tb_proyeks");
            $table->enum('role',['foreman', 'employee','supervisors', 'admin']);
            $table->date('joined_date');
            $table->date('terminate_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_per_teams');
    }
};
