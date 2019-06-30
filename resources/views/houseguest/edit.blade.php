@extends('layouts.app')

@section('content')

    <div class="w-full flex justify-center">
        <div class="card w-full sm:w-2/3 md:w-1/2 shadow">
            <div class="card-body">
                <h3 class="card-title">
                    Editing {{ $houseguest->name }}
                </h3>
                <hr>
                <form action="{{ route('houseguest.update', ['houseguest' => $houseguest->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="pool_id" value="{{ $houseguest->pool_id }}" hidden>

                    <div class="form-group">
                        <image-uploader name="photo" image="{{ $houseguest->photo }}"></image-uploader>
                    </div>

                    <div class="form-group">
                        <label for="name">
                            Name:
                        </label>
                        <input type="text" class="form-control" name="name" placeholder="John Smith" value="{{ $houseguest->name }}" required>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-blue hover:bg-blue-dark w-full shadow mt-3 text-white">
                            <i class="fas fa-plus-circle"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
