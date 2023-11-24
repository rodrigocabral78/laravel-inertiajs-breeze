<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        $user = DB::select('select name from users where name like ?', [
            'Management User',
        ]);
        if (!$user) {
            User::factory()->create([
                'name'       => 'Management User',
                'email'      => 'management@example.com',
                'password'   => 'password',
                'is_admin'   => 1,
                'is_active'  => 1,
            ]);
        }

        $user = DB::select('select name from users where name like ?', [
            'Developer User',
        ]);
        if (!$user) {
            User::factory()->create([
                'name'       => 'Developer User',
                'email'      => 'developer@example.com',
                'password'   => 'password',
                'is_admin'   => 1,
                'is_active'  => 1,
            ]);
        }

        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            TagSeeder::class,
        ]);

        foreach (Post::all() as $post) { // loop through all posts
            $random_tags = Tag::all()->random(rand(2, 5))->pluck('id')->toArray();
            // Insert random post tag
            foreach ($random_tags as $tag) {
                DB::table('post_tags')->insert([
                    'post_id'    => $post->id,
                    'tag_id'     => Tag::all()->random(1)[0]->id,
                    'created_by' => Auth::id() ?: 1,
                    'updated_by' => Auth::id() ?: 1,
                    'created_at' => Carbon::now(), // or date("Y-m-d H:i:s")
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
        Model::reguard();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
