@extends('layouts.app')

@section('heading')
    Pools
@endsection

@section('content')

    @if(!count($pools))
        <div class="flex justify-center">

            <div class="py-3">
                <i class="fas fa-heart-broken text-center text-5xl text-red w-full"></i>
                <h3 class="text-center">Looks like you dont have any pools yet.</h3>
            </div>

        </div>
    @endif

    @foreach($pools as $pool)
        <div class="w-full flex justify-center my-2">
            <a href="{{ route('fantasy-pool.dashboard', ['pool' => $pool->id]) }}"
               class="pool-banner flex justify-between hover:bg-blue-lightest transition transition-property-all bg-grey-lightest overflow-hidden rounded border border-blue-darker shadow">
                <div class="flex justify-between text-xl w-full">
                    <img src="{{ $pool->photo }}" alt=""
                         class="pools-img shadow-md mr-2 w-1/2 md:w-1/3 h-auto">
                    <div class="flex flex-col justify-center flex-1 pl-1 pr-3 py-2">
                        <div class="flex flex-col justify-around text-xl text-blue-dark font-bold text-right">{{ $pool->score }}</div>
                        <div class="text-base text-right">{{ $pool->name }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

    <div class="w-full flex justify-center my-2">
        <a href="{{ route('fantasy-pool.create') }}"
           class="pool-banner flex justify-between hover:bg-blue-lightest transition transition-property-all bg-white rounded border border-blue-darker shadow p-3">
            <div class="flex flex-col justify-center h-100 text-center text-grey hover:text-black transition transition-property-all w-full">
                <i class="fas fa-plus-circle text-5xl"></i>
                <span class="w-100 text-2xl mt-3">Create Pool</span>
            </div>
        </a>
    </div>

@endsection
