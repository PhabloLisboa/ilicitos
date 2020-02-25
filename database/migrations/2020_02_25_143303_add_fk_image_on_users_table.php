<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkImageOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('users', function (Blueprint $table){
            $table->unsignedBigInteger('avatar_id')->after('sys_role_id')->nullable();
            $table->foreign('avatar_id')->references('id')->on('images')->onDelete('set null');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(Blueprint $table)
    {
        $table->dropForeign('avatar_id');
    }
}
