<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnimalComment extends Component
{
    public $animal,$comment="";
    protected $listeners = ['render'];
    protected $rules = [
        'comment' => "required|max:255"
    ];
    public function mount(Animal $animal)
    {
        $this->animal = $animal;
    }
    public function render()
    {
        $this->animal = Animal::find($this->animal->id);
        return view('livewire.animals.animal-comment');
    }
    public function save(){
       $this->validate();
       $this->animal->comments()->create([
           'comment' => $this->comment,
           'comment_type_id' => 1,
           'user_id' => Auth::user()->id,
           'animal_id' => $this->animal->id,
       ]);
       $this->reset('comment');
       $this->render();
    }
}
