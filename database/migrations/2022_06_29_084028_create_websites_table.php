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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->string('url')->nullable();
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->string('type')->nullable();
            $table->string('website_type')->nullable();
            $table->boolean('with_credentials')->default(false);
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
        Schema::dropIfExists('websites');
    }
};
