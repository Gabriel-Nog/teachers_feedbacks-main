<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'name' => 'Turma 1',
                'shift' => 'manha',
                'year' => '2024',
            ],
           
        ];

        foreach($classes as $class){
            Classes::create($class);
        }
    }
}
