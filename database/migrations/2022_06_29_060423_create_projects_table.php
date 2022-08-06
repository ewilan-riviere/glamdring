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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('git_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('path')->nullable();
            $table->text('description')->nullable();
            $table->string('default_branch')->nullable();
            $table->dateTime('git_created_at')->nullable();
            $table->dateTime('git_updated_at')->nullable();
            $table->string('web_url')->nullable();
            $table->string('clone_url')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('readme_raw')->nullable();
            $table->string('package_json_raw')->nullable();
            $table->string('composer_json_raw')->nullable();
            $table->string('visibility')->nullable();
            $table->boolean('is_open_source')->default(0);
            $table->string('project_status')->nullable();
            $table->string('pipeline')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
