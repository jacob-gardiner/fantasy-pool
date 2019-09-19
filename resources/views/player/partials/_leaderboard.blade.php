<div class="table-link-group border rounded-lg overflow-hidden">
    <div class="table-link-body">
        @foreach($players as $player)
            <leaderboard-row
                link="{{ route('player.show', ['player' => $player->id]) }}"
                photo="{{  ($player->user->photo) ? route('user.image', [ 'filename' => $player->user->photo ]) : config('app.url') . '/images/placeholders/avatar.png' }}"
                name="{{ $player->name }}"
                score="{{ $player->score }}"
            ></leaderboard-row>
        @endforeach
    </div>
</div>
<div class="flex justify-center mt-2">
    <a href="{{ route('existing-players', ['pool' => $player->pool_id]) }}"
       class="hover:bg-blue-lightest py-1 px-2 rounded"><i class="fas fa-eye"></i> View All</a>
</div>
