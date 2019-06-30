<?php

use App\FantasyPool;
use App\GameAction;
use App\Houseguest;
use App\Player;
use Illuminate\Database\Seeder;

class PoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FantasyPool::class, 10)->create([
            'owner_id' => 1,
        ])->each(function ($pool) {
            $pool->gameActions()->saveMany(factory(GameAction::class, 30))->create([
                'pool_id' => $pool->id
            ]);
            $pool->players()->saveMany(factory(Player::class, 20))->create([
                'pool_id' => $pool->id
            ]);
            $pool->houseguests()->saveMany(factory(Houseguest::class, 20))->create([
                'pool_id' => $pool->id
            ]);
        });
    }
}
