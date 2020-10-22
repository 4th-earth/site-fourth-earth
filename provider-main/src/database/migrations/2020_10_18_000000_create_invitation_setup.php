<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("requests", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date("verified_at")->nullable();
            $table->string("email");
            $table->ipAddress('ip_address')->nullable();
            $table->string("token", 32)->nullable();
        });

        Schema::create("invitations", function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('request_id')->nullable()->constrained();
            $table->string("code", 16)->nullable();
        });

        Schema::table("users", function (Blueprint $table) {
            $table->foreignId('invitation_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
