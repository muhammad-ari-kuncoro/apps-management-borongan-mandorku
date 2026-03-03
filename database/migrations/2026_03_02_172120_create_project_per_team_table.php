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
        Schema::create('project_per_team', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->foreign("project_id")->references("id")->on("project");
            $table->bigInteger('foreman_id')->unsigned()->nullable();
            $table->foreign("foreman_id")->references("id")->on("project_foreman");
            $table->bigInteger('manpower_id')->unsigned()->nullable();
            $table->foreign("manpower_id")->references("id")->on("project_manpower");
            $table->string('category_teams');
            $table->string('location_teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_per_team');
    }
};
