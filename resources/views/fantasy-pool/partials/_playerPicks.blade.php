<table class="table border scroll-table">
    <thead>
    <tr>
        <th scope="col">Avatar</th>
        <th scope="col">Name</th>
        <th scope="col">Points</th>
    </tr>
    </thead>
    <tbody>

    @foreach($players as $player)
        <tr>
            <th><img src="http://placehold.it/50x50" alt="" class="rounded-circle"></th>
            <td class="align-middle">
                <a href="{{ route('houseguest.show', ['houseguest' => $player->id]) }}">
                    {{ $player->name }}
                </a>
            </td>
            <td class="align-middle">50</td>
        </tr>
    @endforeach
    </tbody>
</table>
