<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('profile_image')->nullable();
            $table->string('full_name')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('guardian_name1')->nullable();
            $table->string('gphone_no1')->nullable();
            $table->string('guardian_name2')->nullable();
            $table->string('gphone_no2')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
