<?php

namespace App\Http\Controllers;

use App\Models\Badge_color;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $statuses = Status::orderBy('name')->get();
        return view('status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $badge_colors = Badge_color::orderBy('name')->get();
        return view('status.create',compact('badge_colors'));
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
        $request->validate(['status' => "required|unique:statuses,name"]);

        
        if (Status::create(['name' => $request->status, 'badge_color_id' => $request->badge_color]))
         return redirect(route('status.index'))->with('success',"Se agrego el nuevo tipo de animal: $request->status");
       else
       return redirect(route('status.index'))->with('error',"No pudo agregarse el nuevo tipo de animal: $request->status"); 
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
    public function edit(Status $status)
    {
        //
        $badge_colors = Badge_color::orderBy('name')->get();
        return view('status.edit',compact('status', 'badge_colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
        $status->name = $request->status;
        $status->badge_color_id = $request->badge_color;
        if ($status->save())
        return redirect(route('status.index'))->with('success', "El status $status->name fue editado ");
    else
        return redirect(route('status.index'))->with('error', "No pudo realizarse la edicion");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
        if ($status->delete())
        return redirect(route('status.index'))->with('success', "El status fue eliminado satisfactoriamente");
    else
        return redirect(route('status.index'))->with('error', "No pudo eliminarse el estado");
    }
}
