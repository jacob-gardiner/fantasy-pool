<div class="table-link-group border rounded-lg">
    <div class="table-link-body ">

        @forelse($houseguests as $houseguest)
            <a href="{{ route('houseguest.show', ['houseguest' => $houseguest->id]) }}"
               class="flex justify-between hover:bg-blue-lightest transition transition-property-all p-3">
                <div class="flex justify-between text-xl w-full">
                    <div class="leaderboard-image shadow-md ">
                        <img src="{{ $houseguest->photo }}" alt="" class="rounded   mr-2">
                    </div>
                    <div class="flex flex-col justify-center pl-2 flex-1">

                        <div class="flex flex-col justify-around text-xl text-blue-dark font-bold text-right">{{ $houseguest->score }}</div>
                        <div class="text-base text-right">{{ $houseguest->name }}</div>
                    </div>
                </div>
            </a>
        @empty
            <a href="{{ route('fantasy-pool.add_houseguest', ['pool_id' => $pool->id]) }}"
               class="flex justify-between hover:bg-blue-lightest transition transition-property-all  p-3">
                <div class="flex justify-around text-xl w-full">

                    <div class="flex text-grey-dark">
                        <i class="fas fa-plus-circle text-3xl"></i>
                        <div class="px-2">
                            Add Houseguest
                        </div>
                    </div>
                </div>
            </a>
        @endforelse
    </div>
</div>
@if(count($houseguests))
    <div class="flex justify-center mt-2 ">
        <a href="{{ route('existing-houseguests', ['pool' => $houseguests->first()->pool_id]) }}"
           class="hover:bg-blue-lightest py-1 px-2 rounded"><i class="fas fa-eye"></i> View All</a>
    </div>
@endif
