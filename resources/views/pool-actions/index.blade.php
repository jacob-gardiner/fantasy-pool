@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-grey-darker">Game Actions</h3>
                    <hr>
                    <a href="{{ route('pool.game-actions.create', ['pool' => $poolId]) }}"
                       class="text-grey-darkest hover:text-blue-dark btn bg-grey-light mb-2">
                        <i class="fas fa-plus"></i> Create
                    </a>

                    <div class="list-group">
                        @foreach($actions as $action)

                            <div class="list-group-item flex justify-between">
                                <div class="w-1/2">
                                    {{ $action->name }}
                                </div>

                                <div class="w-1/4">
                                    {{ $action->score }}
                                </div>

                                <a href="{{ route('pool.game-actions.edit', ['action' => $action->id,'pool' => $poolId]) }}"
                                   class="text-blue hover:text-blue-dark">
                                    Edit
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





