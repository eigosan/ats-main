<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JobPosting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
            'usertype' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        for ($i = 0; $i <= 10; $i++) {
            User::create([

                'name' => "User $i",
                'email' => "user$i@user.com",
                'password' => Hash::make('password'),
                'usertype' => 'user',
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }

        // DB::table('job_postings')->insert([

        //     'job_title',
        //     'company',
        //     'address',
        //     'job_description',
        //     'job_category',
        //     'job_type',


        // ]);

    }
}