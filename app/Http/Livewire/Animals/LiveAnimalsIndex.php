<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class LiveAnimalsIndex extends Component
{
    use WithFileUploads, WithPagination;
    public $sort = 'number', $direction = 'desc', $active_only = false;
    public $cant = 200, $search = '';
    protected $listeners = ['removeAnimal'];

    public function render()
    {
        $search = $this->search;
        $animals = Animal::query()
            ->WhereHas('owner', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('number', 'like', '%' . $search . '%')
            ->orWhereHas('type', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->active($this->active_only)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);



        return view('livewire.animals.live-animals-index', compact('animals'));
    }
    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc')
                $this->direction = 'asc';
            else
                $this->direction = 'desc';
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
    public function removeAnimal($animal_id)
    {
        Animal::find($animal_id)->delete();
    }
}
