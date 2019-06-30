@extends('layouts.app')

@section('heading')
    {{ $pool->name }}
@endsection


@section('content')

    <div class="col-12">

        @include('fantasy-pool.partials._selectedHouseguests')

        @if($isOwner)
            <div class="row">

                <div class="w-full md:w-1/2 p-2">
                    <div class="card  my-2">
                        <div class="card-body">
                            <h3 class="card-title">
                                <i class="fas fa-user-plus"></i> Invite Users
                            </h3>
                            <hr>
                            @include('fantasy-pool.partials._inviteUser')
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">

            {{-- Houseguests --}}
            <div class="p-2 w-full md:w-1/2">
                <div class="card   ">
                    <div class="card-body">
                        <div class="flex justify-between items-baseline">
                            <h3 class="card-title text-grey-darkest text-lg md:text-2xl">
                                <i class="fas fa-trophy text-grey-dark"></i> Houseguests Leaderboard
                            </h3>
                            @if($isOwner)
                                <a href="{{ route('fantasy-pool.add_houseguest', $pool->id) }}"
                                   class="text-blue hover:text-blue-dark">Add</a>
                            @endif
                        </div>
                        <hr>
                        @include('houseguest.partials._existing')
                    </div>
                </div>
            </div>
            <div class="p-2 w-full md:w-1/2">
                <div class="card   ">

                    <div class="card-body">
                        <div class="flex justify-between">
                            <h3 class="card-title text-grey-darkest text-lg md:text-2xl">
                                <i class="fas fa-trophy text-grey-dark"></i> Players
                            </h3>
                        </div>
                        <hr>
                        @include('player.partials._leaderboard')
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            {{-- Game Actions --}}
            <div class="col-12 col-lg-6">
                <div class="card  my-2">

                    <div class="card-body">
                        <div class="flex justify-between items-baseline">
                            <h3 class="card-title text-grey-darkest text-lg md:text-2xl">
                                <i class="fas fa-clipboard-list text-grey-dark"></i> Available Points


                            </h3>
                            @if($isOwner)
                                <a href="{{ route('pool.game-actions', ['pool' => $pool->id]) }}"
                                   class="text-blue hover:text-blue-dark">Edit</a>
                            @endif
                        </div>
                        <hr>
                        @include('game-actions.index')
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection
