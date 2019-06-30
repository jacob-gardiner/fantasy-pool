@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="flex justify-center">
            <div class="card w-full md:w-2/3 ">
                <div class="card-body ">
                    <h3 class="card-title text-grey-darker "><i class="fas fa-user-cog"></i> My Account</h3>
                    <hr>
                    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <image-uploader name="photo" image="{{ ($user->photo) ? route('user.image', [ 'filename' => $user->photo ]) : null }}"></image-uploader>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control cursor-not-allowed"
                                   value="{{ $user->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-blue hover:bg-blue-dark w-full shadow mt-3 text-white">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
