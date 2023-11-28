<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Envelope;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(App::environment() !== 'production') {
            User::factory(10)->has(
                Envelope::factory(5)->has(
                    Receipt::factory(10)
                )
            )->create();
        }
    }
}
