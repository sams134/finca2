<?php

namespace App\Http\Livewire;

use App\Models\Animal;
use Livewire\Component;
use Livewire\WithFileUploads;

class CameraShow extends Component
{
    use WithFileUploads;

    public $open = false;
    public Animal $animal;
    public $image;
    protected $rules = [
        'image' => "required|image"
    ];
    public function mount(Animal $animal)
    {
        $this->animal = $animal;
    }
    public function render()
    {
        return view('livewire.camera-show');
    }
    public function save()
    {
        $this->validate();
        $image= $this->image->store('public/animals/'.$this->animal->id);
        $this->animal->images()->create([
            'url' => str_replace('public/animals/','',$image),
            'imageable_id' => $this->animal->id,
            'imageable_type' => Animal::class
        ]);
       $this->reset('open');
    }
}
