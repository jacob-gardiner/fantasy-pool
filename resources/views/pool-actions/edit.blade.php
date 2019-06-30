@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Update Action</div>
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
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection





