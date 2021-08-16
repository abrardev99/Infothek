<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AttachmentTable extends Component
{
    public $model;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount($model)
    {
        $this->model = $model;
    }

    public function delete($id)
    {
        Media::find($id)->delete();
        $this->emitSelf('refresh');
        $this->dispatchBrowserEvent('success', ['message' => 'Attachment deleted successfully']);
    }
    public function render()
    {
        return view('livewire.tables.attachment-table');
    }
}
