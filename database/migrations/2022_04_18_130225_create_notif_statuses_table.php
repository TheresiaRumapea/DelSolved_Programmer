<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notif_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('is_read')->default(0);
            $table->integer('is_delete')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('notif_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('notif_id')->references('id')->on('notifs')->onDelete('cascade');
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
        Schema::dropIfExists('notif_statuses');
    }
}
