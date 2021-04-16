<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToProjectsAndTasks extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->nullable()->unsigned();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->nullable()->unsigned();
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
