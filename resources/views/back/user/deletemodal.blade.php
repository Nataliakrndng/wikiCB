@foreach ($users as $item)
    <div class="modal fade" id="modalDelete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header dark:bg-gray-600">
                    <p class="text-white text-2xl font-bold" id="staticBackdropLabel">Delete User</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('users/'.$item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="mb-3">
                            <p class="text-lg">You sure you want to delete "<span class="font-semibold">{{$item->name}}</span>"?</p>
                        </div>
                        <div class="modal-footer mt-3 -mb-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
