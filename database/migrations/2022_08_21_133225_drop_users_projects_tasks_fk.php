<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    }

    /* Drop migration */
    public function down()
    {
        schema::table('tasks', function (Blueprint $table){
            $table->dropForeign(['project_id']);
            $table->dropColumn(['project_id']);
        });


        schema::table('projects', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
        });

        schema::table('users', function (Blueprint $table){
            $table->dropForeign(['position_id']);
            $table->dropColumn(['position_id']);
        });
    }
};
