<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['email' => 'admin@localhost.com',
                'name' => 'Admin User',
                'username' => 'admin_user',
                'password'=> bcrypt('a123456a@'),
                'admin' => 1,
                'created_at'=> Carbon::now(),
                'updated_at' => Carbon::now()]
        ]);
    }
}
