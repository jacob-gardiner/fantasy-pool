@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-grey-dark">Create</h3>
                    <hr>
                    <form action="{{ route('pool.game-actions.store', ['pool' => $pool_id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="score">Score</label>
                            <input type="number" id="score" name="score" class="form-control" required>
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





