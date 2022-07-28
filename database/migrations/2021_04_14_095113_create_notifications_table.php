<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('notification_info_id')->nullable();
            $table->foreign('notification_info_id')->references('id')->on('notification_infos')->onDelete('cascade');

            $table->enum('user_type', ['client','admin'])->default('admin');

            $table->unsignedBigInteger('from_user_id')->nullable(); //admins

            $table->unsignedBigInteger('to_user_id')->nullable();
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->text('message')->nullable();

            $table->enum('notification_type', ['admin'])->default('admin');
            $table->enum('action_type', ['nothing'])->default('nothing');

            $table->enum('is_read', ['no','yes'])->default('no');


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
        Schema::dropIfExists('notifications');
    }
}
