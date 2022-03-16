<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('gender')->orderBy('name', 'ASC')->get();
        return view('types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(['type' => "required|unique:types,name"]);

        
         if (Type::create(['name' => $request->type, 'gender' => $request->gender]))
          return redirect(route('types.index'))->with('success',"Se agrego el nuevo tipo de animal: $request->type");
        else
        return redirect(route('types.index'))->with('error',"No pudo agregarse el nuevo tipo de animal: $request->type"); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
        return view('types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
        $type->name = $request->type;
        $type->gender = $request->gender;
        if ($type->save())
        return redirect(route('types.index'))->with('success', "El tipo de animal $type->name fue editado ");
    else
        return redirect(route('types.index'))->with('error', "No pudo realizarse la edicion");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
        if ($type->delete())
        return redirect(route('types.index'))->with('success', "El tipo de animal fue eliminado satisfactoriamente");
    else
        return redirect(route('types.index'))->with('error', "No pudo eliminarse el tipo de animal");
    }
}
