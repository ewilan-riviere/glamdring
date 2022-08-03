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
            $table->foreignId('main_technology_id')->after('pipeline')->nullable();
            $table->foreign('main_technology_id')
                ->references('id')
                ->on('technologies')
                ->nullOnDelete()
            ;

            $table->foreignId('main_repository_id')->after('main_technology_id')->nullable();
            $table->foreign('main_repository_id')
                ->references('id')
                ->on('repositories')
                ->nullOnDelete()
            ;

            $table->foreignId('main_website_id')->after('main_repository_id')->nullable();
            $table->foreign('main_website_id')
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
            $table->dropColumn('main_technology_id');
            $table->dropColumn('main_repository_id');
            $table->dropColumn('main_website_id');
        });
    }
};
