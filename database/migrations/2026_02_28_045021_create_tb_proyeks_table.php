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
        Schema::create('tb_proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('code_project')->unique();
            $table->string('name_project');
            $table->string('type_project');
            $table->string('name_client');
            $table->string('pic_client');
            $table->string('location_project');
            $table->date('start_date_project');
            $table->date('end_date_project')->nullable();
            $table->unsignedBigInteger('progress')->default(0);
            $table->enum('status', ['draft','active','deadline','done','cancel'])->default('draft');
            $table->bigInteger('nilai_kontrak')->default(0);
            $table->bigInteger('mandor_id')->unsigned()->nullable();
            $table->foreign("mandor_id")->references("id")->on("users");
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
        Schema::dropIfExists('tb_proyeks');
    }
};
