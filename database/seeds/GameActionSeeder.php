<?php

use App\GameAction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GameAction::class, 20)->create();
    }
}
