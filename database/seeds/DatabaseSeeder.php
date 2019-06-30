<?php

use Illuminate\Database\Eloquent\Model;
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
        Model::unsetEventDispatcher();
        $this->call(UserSeeder::class);
        $this->call(PoolSeeder::class);
        $this->call(GameActionSeeder::class);
        $this->call(HouseguestSeeder::class);
    }
}
