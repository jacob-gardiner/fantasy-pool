@extends('layouts.app')

@section('heading')
    {{ $houseguest->name }}
@endsection

@section('content')
    <a href="/fantasy-pool/{{ $houseguest->pool->id }}/dashboard"
       class="btn bg-grey-light hover:bg-grey mb-3 text-blue-darker">
        <i class="fas fa-reply"></i>
        Dashboard
    </a>

    @if($isOwner)
        <a href="{{ route('houseguest.edit', ['houseguest' => $houseguest]) }}"
           class="btn bg-grey-light hover:bg-grey mb-3 text-blue-darker">
            <i class="fas fa-pencil-alt"></i> Edit</a>
    @endif

    <div id="admin_show_houseguest" class="card">
        <div class="card-header mb-5 bg-grey-darker pb-0">
            <div class="d-flex justify-content-around">
                <div class="houseguest-img shadow-md">
                    <img src="{{ $houseguest->photo }}" alt="" class="rounded">
                </div>
            </div>
        </div>
        <div class="card-body">
            <h1 class="text-center text-blue mb-0">{{ $houseguest->score }}</h1>
            <h2 class="text-center mb-3">{{ $houseguest->name }}</h2>

            {{-- Actions the houseguest already has --}}
            @include('houseguest.partials._existingActions')

            @if($isOwner)
                {{-- Available Actions to add --}}
                @include('houseguest.partials._addActions')
            @endif
        </div>
    </div>

@endsection
