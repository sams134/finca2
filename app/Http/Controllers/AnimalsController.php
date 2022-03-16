<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Earing_color;
use App\Models\Owner;
use App\Models\Status;
use App\Models\Type;
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
        return view('animals.create',compact('males', 
                                             'females',
                                             'colors', 
                                             'earingColors',
                                             'statuses',
                                             'owners'
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
            
        ])){
                if ($request->comment)
                $animal->comments()->create([
                    'comment' => $request->comment,
                ]);
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
        return view('animals.edit',compact('animal','males', 
                                            'females',
                                            'colors', 
                                            'earingColors',
                                            'statuses',
                                            'owners'));
    }
}