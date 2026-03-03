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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('code_project')->unique();
            $table->bigInteger('foreman_id')->unsigned()->nullable();
            $table->foreign("foreman_id")->references("id")->on("project_foreman");
            $table->string('name_project');
            $table->string('type_project');
            $table->string('name_client');
            $table->string('pic_client');
            $table->string('location_project');
            $table->date('start_date_project');
            $table->date('end_date_plan_project');
            $table->date('end_date_actual')->nullable();
            $table->unsignedBigInteger('progress')->default(0);
            $table->enum('status', ['draft','active','deadline','done','cancel'])->default('draft');
            $table->bigInteger('contract_value')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
