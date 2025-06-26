<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Outros seeders...
        $this->call(ContactsTableSeeder::class);
    }
}
