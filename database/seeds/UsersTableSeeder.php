<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(App\User::class)->create([
                    "name" => "Admin",
                    "email" => "admin@abenepi.com.br",
                    "password" => bcrypt(env('ADMIN_PWD', '123321'))]
            );
        } catch (\Illuminate\Database\QueryException $exception) {

        }
    }
}
