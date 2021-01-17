<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('members')->insert(['name'=>'Emma','age'=>'20','points'=>'25','address'=>'Street X, City, ST, CA']);
        DB::table('members')->insert(['name'=>'Noah','age'=>'21','points'=>'18','address'=>'Avenue 1, City, ST, CA']);
        DB::table('members')->insert(['name'=>'James','age'=>'22','points'=>'17','address'=>'Street 20, City, ST, CA']);
        DB::table('members')->insert(['name'=>'William','age'=>'23','points'=>'6','address'=>'Street 30, City, ST, CA']);
        DB::table('members')->insert(['name'=>'Olivia','age'=>'24','points'=>'3','address'=>'Street Z, City, ST, CA']);
    }
}
