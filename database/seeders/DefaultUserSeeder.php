<?php

namespace Database\Seeders;

use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Mohammad',
            'last_name' => 'shahbazi',
            'email' => 'leberman11@gmail.com'
        ]);
    }
}
