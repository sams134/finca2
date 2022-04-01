<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Earing_color;
use App\Models\Owner;
use App\Models\Status;
use App\Models\Type;
use App\Models\Weight;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    //

    public function create(){
        $males = Type::where('gender',1)->get();
        $females = Type::where('gender',2)->get(); 
        $colors = Color::orderBy('name')->get();
        $earingColors = Earing_color::orderBy('name')->get();
        $owners = Owner::orderBy('name')->get();
        $statuses = Status::orderBy('name')->get();
        $animals = Animal::where('gender',2)->orderBy('number')->latest()->get();
        return view('animals.create',compact('males', 
                                             'females',
                                             'colors', 
                                             'earingColors',
                                             'statuses',
                                             'owners', 
                                             'animals'
                                            )
                    );
    }
   
    public function store(Request $request){
        
        $request->validate(['number' => "required|max:5"]);
        

        $type_id = $request->gender == 1 ? $request->male_id : $request->female_id;
         
           
        if ($animal = Animal::create([
            'number' => $request->number,
            'gender' => $request->gender,
            'owner_id' => $request->owner_id,
            'color_id' => $request->color_id,
            'status_id' => $request->status_id,
            'type_id' => $type_id,
            'earing_color_id' => $request->earing_color_id,
            'description' => $request->description,
            'is_criollo' => $request->is_criollo,
            'born_date' => ($request->is_criollo == 1)?$request->born_date:null,
            'animal_id' => ($request->is_criollo == 1)?$request->animal_id:null,
            'bought_from' => ($request->is_criollo == 2)?$request->bought_from:null,
            'bought_date' => ($request->is_criollo == 2)?$request->bought_date:null,
            'cost' => ($request->is_criollo == 2)?$request->cost:null,
            'bought_weight' => ($request->is_criollo == 2)?$request->bought_weight:null,
        ])){
               
                if($request->hasFile('photo'))
                {
                    $filenameWithExt    = $request->file('photo')->getClientOriginalName();
                    $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension          = $request->file('photo')->getClientOriginalExtension();
                    $fileNameToStore    = $filename.'_'.time().'.'.$extension;
                    $path               = $request->file('photo')->storeAs('public/animals/'.$animal->id."/", $fileNameToStore);
                    $animal->images()->create([
                        'url' => $animal->id."/".$fileNameToStore,
                        'imageable_id' => $animal->id,
                        'imageable_type' => Animal::class
                    ]);
                } 
                return redirect(route('animals.index'))->with('success', "Animal correctamente creado");
        }
        else
                return redirect(route('animals.index'))->with('error', "No pudo crearse el animal");
        
    }

    public function edit(Animal $animal)
    {
        
        $males = Type::where('gender',1)->get();
        $females = Type::where('gender',2)->get(); 
        $colors = Color::orderBy('name')->get();
        $earingColors = Earing_color::orderBy('name')->get();
        $owners = Owner::orderBy('name')->get();
        $statuses = Status::orderBy('name')->get();
        $animals = Animal::where('gender',2)->orderBy('number')->latest()->get();
        return view('animals.edit',compact('animal','males', 
                                            'females',
                                            'colors', 
                                            'earingColors',
                                            'statuses',
                                            'owners',
                                            'animals'
                                        ));
    }

    public function update(Request $request, Animal $animal)
    {
        
        $request->validate(['number' => "required|max:5"]);
        $animal->owner_id = $request->owner_id;
        $animal->number = $request->number;
        $animal->gender = $request->gender;
        if ($request->gender == 1)
            $animal->type_id = $request->male_id;
        else
            $animal->type_id = $request->female_id;

        $animal->color_id = $request->color_id;
        $animal->earing_color_id = $request->earing_color_id;
        $animal->status_id = $request->status_id;
        $animal->description = $request->description;
        

        if ($animal->save()){
            
            
            if ($request->photoDeleted == "true")
                $animal->images->first()->delete();
            if($request->hasFile('photo'))
            {
                $filenameWithExt    = $request->file('photo')->getClientOriginalName();
                $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension          = $request->file('photo')->getClientOriginalExtension();
                $fileNameToStore    = $filename.'_'.time().'.'.$extension;
                $path               = $request->file('photo')->storeAs('public/animals/'.$animal->id."/", $fileNameToStore);
                $animal->images()->create([
                    'url' => $animal->id."/".$fileNameToStore,
                    'imageable_id' => $animal->id,
                    'imageable_type' => Animal::class
                ]);
            } 
            
            return redirect(route('animals.index'))->with('success', "Se edito la informacion del animal #$animal->number");
        } else
        return redirect(route('animals.index'))->with('error', "No pudo editarse el animal #$animal->number");

       
    }
    public function show(Animal $animal)
    {
        return view('animals.show',compact('animal'));
    }

    //api 


    public function getWeights($id){
        $animal = Animal::find($id);
        if ($animal->weights->count() > 0){
            $firstDate = $animal->weights;
            $lastDate = $firstDate->reverse();
             $explotedDate = explode('-',$firstDate->first()->date);
             $firstMonth = $explotedDate[1]*1;
             $firstYear = $explotedDate[0]*1;
     
              $explotedDate = explode('-',$lastDate->first()->date);
             $lastMonth = $explotedDate[1];
             $lastYear = $explotedDate[0]*1; 
     
             $range = ($lastYear-$firstYear)*12+($lastMonth-$firstMonth);
     
             
             //for($i=$firstMonth;$i<($firstMonth+$range);$i++)
              // $monthlyWeight[$this->getMonthName(($i-1))." '".($year+intdiv(($i-1),12))-2000] = 0; 
             for($i=($firstMonth);$i<=($range+$firstMonth);$i++)
             {
                 $yearIncrease = intdiv(($i-1),12);
                 $month = ((($i-1)-(intdiv(($i-1),12)*12))+1);
                 $months[] = $month;
                 $years[] = $firstYear+$yearIncrease;
                 $weight = $this->getWeightAverage($id,$month,$firstYear+$yearIncrease);
                 $weights[] = $weight==0?null:$weight;
             }
             $res = [
                 'init' => $firstMonth,
                 'firstYear' => $firstYear-2000,
                 'range' => $range,
                 'weights' => $weights,
                 'months' => $months,
                 'years' => $years,
             ];
             return json_encode($res);
        }
        return json_encode(null);
       
    }
    private function getWeightAverage($animal_id,$month,$year){
        $w1 = Weight::query()
                ->where('animal_id',$animal_id)
                ->whereMonth('date',date($month))
                ->whereYear('date',date($year))
                ->average('weight');
               
            return $w1;
    }
   

    
}
