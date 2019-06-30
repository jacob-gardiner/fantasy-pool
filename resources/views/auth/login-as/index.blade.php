@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="card col">
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($users as $user)
                                <a href="{{ route('login-as.show', ['id' => $user->id]) }}"
                                   class="list-group-item hover:bg-blue-lightest">
                                    {{ $user->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
