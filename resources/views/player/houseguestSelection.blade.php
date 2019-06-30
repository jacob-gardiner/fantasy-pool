@extends('layouts.app')

@section('heading')
    Please select your picks from the list of houseguests below.
@endsection

@section('content')
    <a href="{{ route('fantasy-pool.dashboard', ['pool' => $player->pool_id]) }}"
       class="btn bg-grey-light hover:bg-grey mb-3 text-blue-darker">
        <i class="fas fa-reply"></i>
        Dashboard
    </a>
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center ">
                        Available Houseguests
                    </h3>
                    <hr>

                    @include('player.partials._userSelectionNotice')

                    @include('player.partials._selectHouseguests')
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center py-3">
                        Your Houseguests
                    </h3>

                    <ul class="list-group">
                        @foreach($selectedHouseguests as $houseguest)
                            <li class="list-group-item">
                                {{ $houseguest->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
