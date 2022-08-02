<?php

use App\Enums\AccountStatus;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('accountCode');
            $table->string('fullName');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('gender');
            $table->string('dateJoin');
            $table->string('avatar');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable(); // chuc vu
            $table->unsignedBigInteger('user_id')->nullable(); // Ai la nguoi tao tai khoan nay
            $table->string('status')->default(AccountStatus::Activate);
            $table->timestamps();

            $table
                ->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('position_id')->references('id')->on('positions')
                ->onUpdate('cascade');
            $table
                ->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
