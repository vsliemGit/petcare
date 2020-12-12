<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        array_push($list, [
            'username'  => "admin",
            'name' => 'Admin',
            'password'   => bcrypt('QupTD3sC'),
            'email'     => "cafroostb10298@gmail.com",
            'is_admin' => 1,
        ]);
        DB::table('users')->insert($list);
    }
}
