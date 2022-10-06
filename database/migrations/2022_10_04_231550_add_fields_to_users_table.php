<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('nickname', 100);
            $table->string('phone', 20);
            $table->string('address', 100);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('zip', 10);
            $table->string('login', 300);
            $table->tinyInteger('role')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
               'surname',
               'nickname',
               'phone',
               'address',
               'city',
               'state',
               'zip'
            ]);
        });
    }
}
