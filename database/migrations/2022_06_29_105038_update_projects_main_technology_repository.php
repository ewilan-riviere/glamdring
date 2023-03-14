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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('technology_id')->after('pipeline')->nullable();
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->nullOnDelete()
            ;

            $table->foreignId('repository_id')->after('technology_id')->nullable();
            $table->foreign('repository_id')
                ->references('id')
                ->on('repositories')
                ->nullOnDelete()
            ;

            $table->foreignId('website_id')->after('repository_id')->nullable();
            $table->foreign('website_id')
                ->references('id')
                ->on('websites')
                ->nullOnDelete()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('technology_id');
            $table->dropColumn('repository_id');
            $table->dropColumn('website_id');
        });
    }
};
