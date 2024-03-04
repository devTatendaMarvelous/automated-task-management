<?php

namespace Database\Seeders;

use App\Models\PriorityLevel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name'=>'Admin',
            'email'=>'admin@tms.com',
            'password'=>Hash::make('password'),
            'role'=>'Admin'
    ]);
    }
}
