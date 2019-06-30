@extends('layouts.app')

@section('heading')
    {{ $pool->name }}
@endsection

@section('content')

    <a href="{{ route('fantasy-pool.dashboard', ['pool' => $pool->id ]) }}"
       class="btn bg-grey-light hover:bg-grey mb-2 text-blue-darker">
        <i class="fas fa-reply"></i> Dashboard
    </a>

    <div id="pool_player_leaderboard" class="col-12">
        <div class="row">
            <div class="card col">
                <div class="card-body">
                    <h1 class="card-title text-grey-darkest text-2xl md:text-3xl">
                        <i class="fas fa-trophy text-grey-dark"></i>
                        Houseguests Leaderboard</h1>
                    <hr>
                    <div class="table-link-group border rounded-lg">
                        <div class="table-link-body">
                            @foreach($houseguests as $houseguest)
                                <a href="{{ route('houseguest.show', ['houseguest' => $houseguest->id]) }}"
                                   class="flex justify-between hover:bg-blue-lightest transition transition-property-all p-3">
                                    <div class="flex justify-between text-xl w-full">
                                        <div class="leaderboard-image shadow-md">
                                            <img src="{{ $houseguest->photo }}" alt="" class="rounded mr-2">
                                        </div>
                                        <div class="flex flex-col justify-center pl-2 flex-1">
                                            <div class="flex flex-col justify-around text-xl text-blue-dark font-bold text-right">
                                                {{ $houseguest->score }}
                                            </div>
                                            <div class="text-base text-right">{{ $houseguest->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
