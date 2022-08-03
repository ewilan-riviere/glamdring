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
        Schema::create('project_technology', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable();
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->nullOnDelete()
            ;

            $table->foreignId('technology_id')->nullable();
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->nullOnDelete()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
