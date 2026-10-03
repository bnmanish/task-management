<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            ['name' => 'Inventory Management System','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Appointment Booking System','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Payment Gateway Platform','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'URL Shortener','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Property Listing Portal','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Task Management System','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Customer Relationship Management','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'E-Commerce Platform','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Employee Management System','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Online Learning Platform','created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
