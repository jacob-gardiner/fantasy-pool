@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex justify-between">
                    <h3 class="mb-0 self-center">Update Action</h3>
                    <form action="{{ route('game-actions.destroy', ['action' => $action->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="hover:bg-red-lighter text-red-darkest outline-none px-3 py-2 rounded"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <div class="card-body">

                    <form action="{{ route('pool.game-actions.update', ['action' => $action->id, 'pool' => $action->pool_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $action->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="score">Score</label>
                            <input type="number" id="score" name="score" class="form-control" value="{{ $action->score }}" required>
                        </div>
                        <button class="btn btn-primary  text-uppercase">
                            Update
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection





