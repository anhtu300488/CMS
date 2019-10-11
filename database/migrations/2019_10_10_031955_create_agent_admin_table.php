<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_admin', function (Blueprint $table) {
            $table->bigIncrements('agentId');
            $table->string('agentName');
            $table->integer('agentLevel');
            $table->string('agentPrefix');
            $table->float('rate');
            $table->string('phoneNumber');
            $table->string('address');
            $table->string('cash');
            $table->integer('createdAgent');
            $table->integer('versionNumber');
            $table->integer('status');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_admin');
    }
}
