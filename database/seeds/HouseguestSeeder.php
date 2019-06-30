<?php

use App\Houseguest;
use Illuminate\Database\Seeder;

class HouseguestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Houseguest::class, 20)->create([
            'pool_id' => 1
        ]);
    }
}
