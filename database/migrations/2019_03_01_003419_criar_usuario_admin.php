<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarUsuarioAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\User::create(
            [
                "name" => "Admin",
                "email" => "admin@abenepi.com.br",
                "password" => bcrypt(env('ADMIN_PWD', '123321'))
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\User::where('email', 'admin@abenepi.com.br')->delete();
    }
}
