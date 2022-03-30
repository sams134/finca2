<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WeightWatcher extends Component
{
    public $animal;
    public $weight,$date,$today=true;
    protected $rules = [
        'weight' => "required|gt:0"
    ];
    public function mount(Animal $animal)
    {
        $this->date = Carbon::now()->format('Y-m-d');
       
        $this->animal = $animal;
    }
    public function render()
    {
        $this->animal = Animal::find($this->animal->id);
        return view('livewire.animals.weight-watcher');
    }
    public function save(){
        $this->validate();
        $this->animal->weights()->create([
            'weight' => $this->weight,
            'date' => $this->date
        ]);
        $this->animal->comments()->create([
            'comment' => 'Pesa al dia '.Carbon::parse($this->date)->format('d/m/Y').": ".$this->weight,
            'animal_id' => $this->animal->id,
            'user_id' => Auth::user()->id,
            'comment_type_id' => 2
        ]);
      
        $this->reset('weight');
        $this->date = Carbon::now()->format('Y-m-d');
        $this->render();
        $this->emit('redraw');
        $this->emitTo('animals.animal-comment','render');
     }
     public function redibujar()
     {
        $this->emit('redraw');
     }
}
