<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable();
            $table->integer('active')->default(0);
        });

        DB::table('users')->insert([
            'name'          => 'Richard Clark',
            'email'         => 'richievc@gmail.com',
            'username'      => 'silconone',
            'password'      => bcrypt('Tmaster$101'),
            'active'        => 1,
        ]);

        DB::table('users')->insert([
            'name'          => 'Craig Gundry',
            'email'         => 'gundrycs@cisworldservices.org',
            'username'      => 'gundrycs',
            'password'      => bcrypt('Secure$101'),
            'active'        => 1,
        ]);

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
