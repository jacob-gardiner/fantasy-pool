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
                                <leaderboard-row
                                    link="{{ route('houseguest.show', ['houseguest' => $houseguest->id]) }}"
                                    photo="{{ $houseguest->photo }}"
                                    name="{{ $houseguest->name }}"
                                    score="{{ $houseguest->score }}"
                                ></leaderboard-row>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
