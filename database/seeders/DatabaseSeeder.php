<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
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

        $this->call(UserSeeder::class);
        Model::reguard();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
