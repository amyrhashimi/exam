<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $type ;
    public $paginate = 10;
    protected $paginationTheme = 'bootstrap';
    protected $queryString  = ['type', 'paginate'];


    public function render()
    {
        $users = User::latest();
        if (isset($this->type) and $this->type == 1){
           $users =  User::where('isAdmin' , 1);
        }elseif (isset($this->type) and $this->type == 0){
            $users =  User::where('isAdmin' , 0);
        }
        $users = $users->paginate($this->paginate);
        return view('livewire.admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        return redirect()->route('users.edit' , $id);
    }
}
