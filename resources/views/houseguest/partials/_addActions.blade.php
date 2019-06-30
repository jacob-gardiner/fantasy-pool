<section class="pt-2">
    <table class="table border">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Points</th>
            @if($isOwner)
                <th scope="col-6"></th>
                <th scope="col"></th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($gameActions as $action)
            <tr>
                <td>{{ $action->name }}</td>
                <td>{{ $action->score }}</td>
                @if($isOwner)
                    <td colspan="2">
                        <form action="{{ route('houseguest-actions.store') }}" method="POST">
                            @csrf
                            <input type="text" name="houseguest_id" value="{{ $houseguest->id }}" hidden>
                            <input type="text" name="action_id" value="{{ $action->id }}" hidden>

                            <div class="flex justify-end">
                                <div class="form-group">
                                    <label for="note" hidden>Note</label>
                                    <input type="text" name="note" id="note" class="form-control rounded-r-none" placeholder="Note...">
                                </div>
                                <div class="">
                                    <button class="btn bg-green text-white hover:bg-green-dark w-full rounded-l-none">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
