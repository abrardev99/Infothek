<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    protected function rules()
    {
        return [
            'user.name' => ['required', 'string', 'max:255'],
            'user.email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore(1)],
        ];
    }

    public function update()
    {
        $this->validate();
        $this->user->save();

        $this->dispatchBrowserEvent('success', ['message' => 'User profile updated successfully']);
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
