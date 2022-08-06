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
        Schema::create('forge_users', function (Blueprint $table) {
            $table->id();
            $table->integer('forge_id')->nullable();
            $table->string('username')->nullable();
            $table->string('api_token')->nullable();
            $table->string('email')->nullable();
            $table->string('forge_type')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('web_url')->nullable();
            $table->string('repos_url')->nullable();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('blog')->nullable();
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->string('public_repos')->nullable();
            $table->string('public_gists')->nullable();
            $table->string('followers')->nullable();
            $table->string('following')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('forge_users');
    }
};
