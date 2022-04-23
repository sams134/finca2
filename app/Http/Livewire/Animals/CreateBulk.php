<?php

namespace App\Http\Livewire\Animals;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Earing_color;
use App\Models\Owner;
use App\Models\Status;
use App\Models\Type;
use App\Models\Weight;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateBulk extends Component
{
    public $males,$females,$colors,$earingColors,$owners,$statuses;
    public $cant = 1,$owner_id=1,$gender=1,$earing_color_id=3,$status_id=3,$bought_from,$bought_date,$type_id=[],$color_id=[],$cost=[],$bought_weight=[],$description=[];
    public $number = [],$message="";
    protected $rules = [
            'number' => 'required',
            'bought_date' => 'required|date',
          
                ];

    public function mount()
    {
        $this->males = Type::where('gender',1)->get();
        $this->females = Type::where('gender',2)->get(); 
        $this->colors = Color::orderBy('name')->get();
        $this->earingColors = Earing_color::orderBy('name')->get();
        $this->owners = Owner::orderBy('name')->get();
        $this->statuses = Status::orderBy('name')->get();
        
    }
    public function render()
    {
        return view('livewire.animals.create-bulk');
    }
    
    public function save(){
        
        $this->message = "guardando";
       // return redirect(route('animals.index'))->with('success',"Creado!");
       $this->validate();
       $this->message = "validado";
       for($i=0;$i<$this->cant;$i++){
          $animal = Animal::create([
              'number' => $this->number[$i],
              'gender' => $this->gender,
              'description' => $this->description[$i],
              'cost' => $this->cost[$i],
              'is_criollo' => Animal::COMPRADO,
              'bought_from' => $this->bought_from,
              'bought_date' => $this->bought_date,
              'bought_weight' => $this->bought_weight[$i],
              'color_id' => $this->color_id[$i],
              'type_id' => $this->type_id[$i],
              'owner_id' => $this->owner_id,
              'status_id' => $this->status_id,
              'earing_color_id' => $this->earing_color_id,
          ]);
          $this->message = "Animal Guardado";
          $fecha_ingreso = Carbon::parse($animal->created_at)->format('d/m/Y');
          $fecha_compra = Carbon::parse($this->bought_date)->format('d/m/Y');
            //comentario de creacion
            Comment::create([
                'comment' => 'Animal ingresado el dia '.$fecha_ingreso. " junto con otros $this->cant animales, comprados a $this->bought_from el dia ".$fecha_compra,
                'animal_id' => $animal->id,
                'user_id' => Auth::user()->id,
                'comment_type_id' => 1
            ]);
          if ($this->bought_weight[$i] > 0) 
          {
                Weight::create([
                    'weight' => $this->bought_weight[$i],
                    'date' => $this->bought_date,
                    'animal_id' => $animal->id
                ]);
                $this->message = "Peso Guardado";
                 //comentario de peso
                Comment::create([
                    'comment' => 'Peso de animal #'.$animal->number. " al dia $fecha_compra es:". $this->bought_weight[$i],
                    'animal_id' => $animal->id,
                    'user_id' => Auth::user()->id,
                    'comment_type_id' => 2
            ]);
              
          }
       }

       return redirect(route('animals.index'))->with('success', "Se ingresaron $this->cant animales");
    }
}
