<section id="game_actions">
    <div class="">

        @foreach($houseguest->actions->sortByDesc('id')->take(5) as $action)
            <div class="flex justify-between p-2 border rounded my-1">
                <div class="flex-1 px-1">
                    <div class="text-3xl text-blue-dark ">
                        {{ $action->action->score }}
                    </div>
                    <div class="">
                        {{ $action->action->name }}
                    </div>

                </div>
                <div class="text-right mr-3 flex flex-col justify-between ">

                    <div class="text-grey">
                        {{ $action->humanDate }}
                    </div>
                    @if($action->note)
                        <div class="p-2 border border-grey-dark text-grey-darkest bg-grey-lightest rounded">{{ $action->note }}</div>
                    @endif
                </div>
                @if($isOwner)
                    <div class="mx-2">

                        <form action="{{ route('houseguest-actions.destroy', ['houseguest_action' => $action->id]) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red hover:text-red-light">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                    </div>
                @endif
            </div>
        @endforeach

        @if(count($houseguest->actions) == 0)
            <div class="flex p-2 justify-center border rounded">
                <div>No Points.... try harder</div>
                <div></div>
                <div></div>
                @if($isOwner)
                    <div></div>
                @endif
            </div>
        @endif

    </div>
</section>
