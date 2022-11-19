<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Destroy extends Component
{
    public User $user;

    public function mount()
    {
        if ($this->user->id == auth()->user()->id)
            return redirect()->route('users')->with('error' , ' شما نمیتوانید خودتان را حذف کنید ');


        $this->user->deleteOrFail();
        return redirect()->route('users')->with('success' , 'کاربر با موفقیت حذف شد.');
    }
}
