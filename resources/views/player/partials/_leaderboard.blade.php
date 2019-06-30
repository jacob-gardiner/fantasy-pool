<div class="table-link-group border rounded-lg">
    <div class="table-link-body">
        @foreach($players as $player)
            <a href="{{ route('player.show', ['player' => $player->id]) }}"
               class="flex justify-between hover:bg-blue-lightest transition transition-property-all p-3">
                <span class="leaderboard-image shadow">
                <img src="{{ ($player->user->photo) ? route('user.image', [ 'filename' => $player->user->photo ]) : config('app.url') . '/images/placeholders/avatar.png' }}"
                     alt="" class="rounded  ">
                </span>
                <div class="flex flex-col justify-center">
                    <div class="text-xl text-blue-dark font-bold text-right">
                        {{ $player->score }}
                    </div>
                    <div class="">
                        {{ $player->name }}
                    </div>

                </div>
            </a>
        @endforeach
    </div>
</div>
<div class="flex justify-center mt-2">
    <a href="{{ route('existing-players', ['pool' => $player->pool_id]) }}"
       class="hover:bg-blue-lightest py-1 px-2 rounded"><i class="fas fa-eye"></i> View All</a>
</div>
