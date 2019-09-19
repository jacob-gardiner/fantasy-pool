<div class="table-link-group border rounded-lg overflow-hidden">
    <div class="table-link-body ">

        @forelse($houseguests as $houseguest)
            <leaderboard-row
                link="{{ route('houseguest.show', ['houseguest' => $houseguest->id]) }}"
                photo="{{ $houseguest->photo }}"
                name="{{ $houseguest->name }}"
                score="{{ $houseguest->score }}"
            ></leaderboard-row>
        @empty
            @if( $isOwner)
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
            @else
                <div class="p-3 text-xl text-grey-dark text-center">
                    No Available Houseguests
                </div>
            @endif
        @endforelse
    </div>
</div>
@if(count($houseguests))
    <div class="flex justify-center mt-2 ">
        <a href="{{ route('existing-houseguests', ['pool' => $houseguests->first()->pool_id]) }}"
           class="hover:bg-blue-lightest py-1 px-2 rounded"><i class="fas fa-eye"></i> View All</a>
    </div>
@endif
