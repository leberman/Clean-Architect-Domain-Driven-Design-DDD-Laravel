<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        if (app()->environment('')) {
//            $this->call(
//                class: DefaultUserSeeder::class
//            );
//        }


        Post::factory(20)
            ->for(User::factory()->create([
                'first_name' => 'Mohammad',
                'last_name' => 'shahbazi',
                'email' => 'leberman11@gmail.com'
            ]))->create();
    }
}
