<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();


            $table->string('code')->nullable();
            $table->enum('user_type',['client'])->default('client');


            $table->enum('phone_code',['+966','+20'])->default('+966');
            $table->string('phone')->nullable();


            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();


            $table->string('address')->nullable();
            $table->double('latitude')->default(0);
            $table->double('longitude')->default(0);


            $table->enum('gender',['male','female'])->default('male');
            $table->date('birthday')->nullable();


            $table->string('logo')->nullable();
            $table->string('banner')->nullable();


            $table->enum('approved_status',['new','accepted','not_accepted'])->default('new');
            $table->integer('approved_by')->nullable();

            $table->enum('is_blocked',['blocked','not_blocked'])->default('not_blocked');
            $table->enum('is_login',['online','offline'])->default('offline');
            $table->integer('logout_time')->nullable();


            $table->timestamp('email_verified_at')->nullable();
            $table->string('confirmation_code')->nullable();
            $table->string('forget_password_code')->nullable();
            $table->enum('software_type',['ios','android','web'])->default('web')->nullable();


            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
