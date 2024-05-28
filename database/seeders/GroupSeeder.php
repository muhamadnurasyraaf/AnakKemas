<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'Abu Ubaidah', 'Group_Uid' => Str::random(5)],
            ['name' => 'Uthman', 'Group_Uid' => Str::random(5)],
            ['name' => 'Ali', 'Group_Uid' => Str::random(5)],
            ['name' => 'Hassan', 'Group_Uid' => Str::random(5)],
            ['name' => 'Hussin', 'Group_Uid' => Str::random(5)],
        ];

        DB::table('groups')->insert($groups);
    }
}
