<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(Faqseeder::class);
        $this->call(MediaSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ChargeSeeder::class);
    }
}
