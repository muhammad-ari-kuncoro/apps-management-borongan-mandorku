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
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->foreign("project_id")->references("id")->on("tb_proyeks");
            $table->string('name_project_mls');
            $table->date('date_target');
            $table->string('finish_date_target');
            $table->unsignedTinyInteger('progress')->default(0);
            $table->enum('status', ['pending', 'process','completed', 'overdue'])->default('pending');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_milestones');
    }
};
