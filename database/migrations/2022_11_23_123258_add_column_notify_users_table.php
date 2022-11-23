<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnNotifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'notify'))
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('notify')->default(false)->after('phone_number');
            $table->string('chat_id')->nullable()->after('notify');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'notify'))
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('notify');
            $table->dropColumn('chat_id');

        });


    }
}
