<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('settings')->insert([
            'key'           => 'app_name',
            'name'          => 'App Name',
            'description'   => 'The Name of the Application or Company Name',
            'value'         => 'KKPDATA',
            'field'         => '{"name":"value","label":"Value", "title":"App Name" ,"type":"text"}',
            'active'        => 1,
        ]);

        DB::table('settings')->insert([
            'key'           => 'logo',
            'name'          => 'Logo (240px)',
            'description'   => 'The Logo size Regular (240px)',
            'value'         => 'logo.png',
            'field'         => '{"name":"value","label":"Value", "title":"Logo" ,"type":"base64_image"}',
            'active'        => 1,
        ]);

        DB::table('settings')->insert([
            'key'           => 'logo-mini',
            'name'          => 'Small Logo (160px)',
            'description'   => 'The Logo size Small (160px)',
            'value'         => 'logo-mini.png',
            'field'         => '{"name":"value","label":"Value", "title":"Logo Mini" ,"type":"base64_image"}',
            'active'        => 1,
        ]);

        DB::table('settings')->insert([
            'key'           => 'admin-bg',
            'name'          => 'Admin Screen Background (1920px)',
            'description'   => 'Background Image (1920px)',
            'value'         => 'admin-bg.png',
            'field'         => '{"name":"value","label":"Value", "title":"BackgroundImage" ,"type":"upload"}',
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
