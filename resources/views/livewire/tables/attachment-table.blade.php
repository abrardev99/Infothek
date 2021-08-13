<div class="col-sm-6">
    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Action</th>
        </thead>
        <tbody>
        @forelse($model->getMedia('attachments') as $attachment)
            <tr>
                <td><a href="{{ optional($attachment)->getUrl() }}" target="_blank">{{ optional($attachment)->name.' '.optional($attachment)->mime_type }}</a></td>
                <td><button wire:click="delete({{ $attachment->id }})" type="button"
                            onclick='return confirm("Are you sure about this action ?") || event.stopImmediatePropagation()'
                            class="btn btn-sm btn-danger">Delete</button></td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
</div>
