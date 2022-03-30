<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use Livewire\Component;

class LiveAnimalsShow extends Component
{
    public $animal;
    protected $listeners = ['render'];
    public function mount(Animal $animal)
    {
        $this->animal = Animal::find($animal->id);
    }
    public function render()
    {
        $this->animal = Animal::find($this->animal->id);
        
        
        return view('livewire.animals.live-animals-show');
    }
    public function dehydrate()
    {
        $this->emit('swiper');
    }
  
    public function test(){
       
    }
}
