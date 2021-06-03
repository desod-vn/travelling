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
            'name' => 'admin',
            'email' => 'thangdotpro@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'admin',
            'fullname' => 'Vương Toàn Thắng',
            'avatar' => Status::APP . 'default/admin.png',
            'gender' => 'Nam',
            'phone' => '0389064540',
            'birthday' => '2000/11/09',
            'slug' => Str::slug('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'xuanhoa',
            'email' => 'lexuanhoa@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'admin',
            'fullname' => 'Lê Xuân Hoa',
            'avatar' => Status::APP . 'default/author.png',
            'gender' => 'Nữ',
            'phone' => '0389064540',
            'birthday' => '2002/06/15',
            'slug' => Str::slug('xuanhoa'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'user',
            'fullname' => 'Người dùng',
            'avatar' => Status::APP . 'default/author.png',
            'gender' => 'Nam',
            'phone' => '0389064540',
            'birthday' => '2001/12/04',
            'slug' => Str::slug('user'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
