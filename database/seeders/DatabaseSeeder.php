<?php

namespace Database\Seeders;

use App\Models\PriorityLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities=[
            [
                'name'=>'High',
                'bonus'=>5,
                'deduction'=>7
            ],
            [
                'name'=>'Medium',
                'bonus'=>3,
                'deduction'=>5
            ],
            [
                'name'=>'Low',
                'bonus'=>2,
                'deduction'=>4
            ],
        ];
        foreach ($priorities as $priority){
            PriorityLevel::create($priority);
        }
    }
}
