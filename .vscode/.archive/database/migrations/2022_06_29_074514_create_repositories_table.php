<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('forge_type')->nullable();
            $table->boolean('is_public')->default(false);
            $table->integer('sort')->nullable();

            $table->foreignId('project_id')->nullable();
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->nullOnDelete()
            ;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
};
