<section id="game_actions">
    <div class="border scroll-small-section rounded">

        <div class="">
            @forelse($gameActions as $action)
                <div class="flex justify-between p-3 text-lg">
                    <div>{{ $action->name }}</div>
                    <div>{{ $action->score }}</div>
                </div>
                @empty
                <a href="{{ route('pool.game-actions.create', ['pool' => $pool->id]) }}"
                   class="flex justify-between hover:bg-blue-lightest transition transition-property-all p-3">
                    <div class="flex justify-around text-xl w-full">

                        <div class="flex text-grey-dark">
                            <i class="fas fa-plus-circle text-3xl"></i>
                            <div class="px-2">
                                Add Action
                            </div>
                        </div>
                    </div>
                </a>
            @endforelse
        </div>
    </div>
</section>
