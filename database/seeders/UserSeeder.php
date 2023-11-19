<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'uuid'       => Str::uuid(),
            'name'       => 'Management User',
            'email'      => 'management@example.com',
            'password'   => 'password',
            'is_admin'   => 1,
            'is_active'  => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        User::factory()->create([
            'uuid'       => Str::uuid(),
            'name'       => 'Developer User',
            'email'      => 'developer@example.com',
            'password'   => 'password',
            'is_admin'   => 1,
            'is_active'  => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // User::factory()->count(28)->create();
        User::factory(28)->create();
    }
}
