<div class="row flex lg:justify-between justify-around">


    @foreach($playerPicks as $pick)

        <div class="my-2 w-100 sm:w-2/3 lg:w-1/3">
            <a href="{{ route('houseguest.show', ['houseguest' => $pick->id]) }}"
               class="card border-0 shadow-md hover:bg-blue-lightest flex justify-between flex-row mx-2 overflow-auto">
                <img src="{{ $pick->photo }}" alt=""
                     class="w-auto card-guest-img ">
                <div class="w-4/5 flex flex-col justify-center pl-3 shadow-md">
                    <h3 class=" text-dark text-4xl font-bold">{{ $pick->score }}</h3>
                    <div class=" text-dark text-lg ">{{ $pick->name }}</div>
                </div>
            </a>
        </div>

    @endforeach

    @if(count($playerPicks) < 3 && $pool->allow_selections)
        <div class="my-2 w-100 sm:w-2/3 lg:w-1/3">
            <a href="{{ route('player-pick.index', ['pool' => $player->pool_id]) }}"
               class="card h-100 border-0 shadow-md hover:bg-blue-lightest p-3  mx-2">
                        <span class="flex flex-col justify-center h-100 text-center text-grey hover:text-black transition transition-property-all">
                            <i class="fas fa-plus-circle text-5xl"></i>
                            <span class="w-100 text-2xl mt-3">Select Houseguest</span>
                        </span>
            </a>
        </div>
    @endif

</div>
