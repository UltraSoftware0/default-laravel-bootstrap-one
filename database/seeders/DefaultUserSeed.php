<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!config('app.debug')){
            return;
        }

        User::query()->insert([
            [
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make(12345678)
            ],
            [
                'name' => 'user',
                'email' => 'user@test.com',
                'password' => Hash::make(12345678)
            ],
        ]);
    }
}
