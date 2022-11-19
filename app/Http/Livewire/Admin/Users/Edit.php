<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public User $user;

    public $name;
    public $family;
    public $email;
    public $phone;
    public $username;
    public $isAdmin;

    public function mount()
    {
        $this->name = $this->user->name;
        $this->family = $this->user->family;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->username = $this->user->username;
    }

    public function render()
    {
        return view('livewire.admin.users.edit');
    }

    public function updated($Name)
    {
        $this->validateOnly($Name);
    }

    protected function rules() {
        return [
            'name' => 'required|between:2,40',
            'family' => 'required|between:2,40',
            'email' => 'nullable|email|unique:users,email,' . $this->user->id,
            'phone' => 'required|unique:users,phone,' . $this->user->id,
            'username' => 'required|unique:users,phone,' . $this->user->id,
        ];
    }

    public function update()
    {
        $validate = $this->validate();

        $this->user->update([
            'name' => $this->name,
            'family' => $this->family,
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
        ]);

        return redirect()->route('users')->with('success' , ' کاربر با موفقیت ویرایش شد. ');

    }

    public function cansel()
    {
        return redirect()->route('users');
    }
}
