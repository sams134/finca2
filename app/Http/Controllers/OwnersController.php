<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $owners = Owner::orderBy('name')->get();
        return view('owners.index',compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('owners.create');
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
        $request->validate(['owner' => "required|unique:owners,name"]);
        
        if (Owner::create(['name' => $request->owner]))
          return redirect(route('owners.index'))->with('success',"Se agrego el nuevo dueño $request->owner");
        else
        return redirect(route('owners.index'))->with('error',"No pudo agregarse el nuevo dueño $request->owner");
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
    public function edit(Owner $owner)
    {
        //
        return view('owners.edit',compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        //
        $owner->name = $request->owner;
        if ($owner->save())
        return redirect(route('owners.index'))->with('success', "El nombre del propietario $owner->name fue editado ");
    else
        return redirect(route('owners.index'))->with('error', "No pudo realizarse la edicion");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
