@extends('layouts.app')

@section('content')

    <div class="w-full flex justify-center">
        <div class="card form-card shadow">
            <div class="card-body">
                <h3 class="card-title"> Editing {{ $pool->name }}</h3>
                <hr>
                <form action="{{ route('fantasy-pool.update', ['fantasyPool' => $pool->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <image-uploader name="photo" image="{{ $pool->photo }}"></image-uploader>
                    </div>
                    <div class="form-group">
                        <label for="name">
                            Name:
                        </label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               value="{{ $pool->name }}"
                               placeholder="Ex. Big Brother Canada 2019"
                               required>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-blue hover:bg-blue-dark w-full shadow mt-3 text-white">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
