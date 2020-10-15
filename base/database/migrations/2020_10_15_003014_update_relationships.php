<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // users <-> invitation <-> request
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('invitation_id')->constrained();
        });

        Schema::table('invitations', function (Blueprint $table) {
            $table->foreignId('request_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
