<?php

namespace Database\Seeders;

use App\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Đặng Thái',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'admin',
            'avatar' => Status::APP . 'default/admin.png',
            'gender' => 'Nam',
            'phone' => '0123456789',
            'birthday' => '1999/1/1',
            'slug' => Str::slug('dang-thai'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('users')->insert([
            'name' => 'Người dùng',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'user',
            'avatar' => Status::APP . 'default/male.png',
            'gender' => 'Nam',
            'phone' => '0123456789',
            'birthday' => '1999/1/1',
            'slug' => Str::slug('nguoi-dung'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
