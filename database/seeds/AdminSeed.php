<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("admins")->truncate();
        \App\Models\Admin::create(["username" => "admin", "password" => Hash::make("123456")]);
    }
}
