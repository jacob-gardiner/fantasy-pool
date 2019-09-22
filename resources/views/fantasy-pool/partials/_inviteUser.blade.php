<form action="{{ route('fantasy-pool.invitePlayer', ['pool_id' => $pool->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Send Invitations</label>
        <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'border-red' : '' }}" placeholder="Email" required>
        @if ($errors->has('email'))
            <span class="text-red-dark" role="alert">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <button class="btn bg-yellow-lighter hover:bg-yellow-light text-yellow-darkest font-bold">
        <i class="fas fa-envelope text-yellow-darker"></i> Invite User
    </button>
</form>
