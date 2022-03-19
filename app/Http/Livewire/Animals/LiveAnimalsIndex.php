<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class LiveAnimalsIndex extends Component
{
    use WithFileUploads, WithPagination;
    public $sort = 'number',$direction = 'desc',$active_only=false;
    public $cant=200,$search='';
    protected $listeners = ['removeAnimal'];

    public function render()
    {
        $searchWord = explode(' ',$this->search);
        $animals = Animal::query()->active($this->active_only);

        

        foreach($searchWord as $key)
        $animals = $animals->WhereHas('owner',function($q) use ($key) {
                                $q->where('name','like','%'.$key.'%');
                            })
                            ->orWhere('number','like','%'.$key.'%')
                            ->orWhereHas('type',function($q) use($key) {
                                $q->where('name','like','%'.$key.'%');
                            });
        $animals = $animals->orderBy($this->sort,$this->direction)
                        ->paginate($this->cant);
        return view('livewire.animals.live-animals-index',compact('animals','searchWord'));
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
