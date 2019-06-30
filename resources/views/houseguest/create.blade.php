@extends('layouts.app')

@section('content')

    <div class="w-full flex justify-center">
        <div class="card w-full sm:w-2/3 md:w-1/2 shadow">
            <div class="card-body">
                <h3 class="card-title">
                    Create a new Houseguest
                </h3>
                <hr>
                <form action="{{ route('houseguest.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="pool_id" value="{{ $pool->id }}" hidden>

                    <div class="form-group">
                       <image-uploader name="photo"></image-uploader>
                    </div>

                    <div class="form-group">
                        <label for="name">
                            Name:
                        </label>
                        <input type="text" class="form-control" name="name" placeholder="John Smith" required>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-blue hover:bg-blue-dark w-full shadow mt-3 text-white">
                            <i class="fas fa-plus-circle"></i> Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(isset($houseguests) && count($houseguests) > 0 )
        <div class="flex justify-around">
            <div class="mt-3 card w-full sm:w-2/3 md:w-1/2 ">
                <div class="card-body">
                    @include('houseguest.partials._existing')
                </div>
            </div>
        </div>
    @endif
@endsection
