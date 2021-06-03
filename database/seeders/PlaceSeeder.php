<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            'name' => 'Hà Nội',
            'slug' => Str::slug('Hà Nội'),
        ]);

        DB::table('places')->insert([
            'name' => 'Sầm Sơn',
            'slug' => Str::slug('Sầm Sơn'),
        ]);

        DB::table('places')->insert([
            'name' => 'Chùa Hương',
            'slug' => Str::slug('Chùa Hương'),
        ]);

        DB::table('places')->insert([
            'name' => 'Yên Tử',
            'slug' => Str::slug('Yên Tử'),
        ]);

        DB::table('places')->insert([
            'name' => 'Bái Đính',
            'slug' => Str::slug('Bái Đính'),
        ]);

        DB::table('places')->insert([
            'name' => 'Phú Quốc',
            'slug' => Str::slug('Phú Quốc'),
        ]);

    }
}
