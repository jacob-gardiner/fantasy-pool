<form action="{{ route('fantasy-pool.invitePlayer', ['pool_id' => $pool->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <button class="btn bg-orange hover:bg-orange-dark text-white">
        <i class="fas fa-envelope"></i> Invite User
    </button>
</form>
