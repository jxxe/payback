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
            User::factory()->has(
                Envelope::factory(10)->has(
                    Receipt::factory(15)
                )
            )->create([
                'name' => 'Jerome Paulos',
                'email' => 'itsjeromepaulos@gmail.com'
            ]);
        }
    }
}
