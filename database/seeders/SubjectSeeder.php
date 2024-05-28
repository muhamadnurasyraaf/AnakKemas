<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => 'Mathematics'],
            ['name' => 'Science'],
            ['name' => 'History'],
            ['name' => 'Geography'],
            ['name' => 'English'],
            ['name' => 'Physical Education'],
            ['name' => 'Art'],
            ['name' => 'Music'],
        ];

        foreach($subjects as $subject){
            Subject::create($subject);
        }

    }
}
