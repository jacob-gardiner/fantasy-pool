@extends('layouts.app')

@section('heading')
    {{ $player->name }}
@endsection

@section('content')
    <a href="/fantasy-pool/{{ $player->pool_id }}/dashboard"
       class="btn bg-grey-light hover:bg-grey mb-3 text-blue-darker">
        <i class="fas fa-reply"></i>
        Dashboard
    </a>
    <div id="admin_show_houseguest" class="card shadow">

        <div class="card-header mb-12 bg-grey-light border-b-0 pb-0">
            <div class="d-flex justify-content-around">
                <div class="houseguest-img shadow">
                    <img src="{{ ($player->user->photo) ? route('user.image', [ 'filename' => $player->user->photo ]) : config('app.url') . '/images/placeholders/avatar.png' }}"
                         alt="">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="flex flex-col justify-center">
                <h2 class="text-center text-blue text-5xl mt-3 mb-0">{{ $player->score }}</h2>
                <h4 class="text-center">{{ $player->name }}</h4>
            </div>

            @forelse($houseguests as $houseguest)
                <div class="mt-4">
                    <h3> {{ $houseguest->name }}</h3>
                    @include('houseguest.partials._existingActions')
                </div>
            @empty
                <div class="text-center border p-3 rounded">No players selected</div>
            @endforelse
        </div>
    </div>

@endsection


