<form action="{{ route('houseguest-actions.destroy', ['houseguest_action' => $action->id]) }}"
      method="POST">
    @csrf
    @method('DELETE')
    <button class="text-red hover:text-red-light">
        <i class="fas fa-trash"></i>
    </button>
</form>
