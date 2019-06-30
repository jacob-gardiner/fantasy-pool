@foreach($houseguests as $houseguest)
    <form action="{{ route('player-pick.store') }}" method="POST"
          class="border rounded my-1 flex justify-between transition transition-property-all overflow-hidden">
        @csrf
        <div class="flex justify-between w-3/4 md:flex-row flex-col">
            <div class="w-full md:w-1/3 flex justify-center">
                <div class="leaderboard-image shadow-md m-2 ">
                    <img src="{{ $houseguest->photo }}" alt="" class="rounded   mr-2">
                </div>
            </div>
            <div class="flex flex-col justify-around md:text-lg w-full md:w-1/3 px-2 text-center">  {{ $houseguest->name }}</div>
        </div>
        <input type="text" name="houseguest_id" value="{{ $houseguest->id }}" hidden>
        <input type="text" name="player_id" value="{{ $player->id }}" hidden>
        <input type="text" name="pool_id" value="{{ $player->pool_id }}" hidden>
        <button class="px-1 sm:px-2 md:px-3 bg-grey-lighter"><i
                    class="fas fa-chevron-circle-right text-3xl text-grey-darker"></i></button>
    </form>
@endforeach
