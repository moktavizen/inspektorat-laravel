<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'email' => 'inspektorat@gresikkab.go.id',
            'name' => 'Admin Inspektorat',
            'password' => bcrypt('Inspektorat1')
        ]);
        Contact::factory()->create([
            'address' => 'Jl. Dr. Wahidin Sudirohusodo No. 245 Gresik',
            'phone' => '(031) 3952823 - 30',
            'email' => 'inspektorat@gresikkab.go.id'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
