<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors = Color::orderBy('name', 'asc')->get();
        return view('colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('colors.create');
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
        $request->validate(['color' => 'required|unique:colors,name']);
        if (Color::create(['name' => $request->color]))
            return redirect(route('colors.index'))->with('success', "Color $request->color agregado satisfactoriamente");
        else
            return redirect(route('colors.index'))->with('error', "Color $request->color no pudo ser agregado");
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
    public function edit(Color $color)
    {
        //
        return view('colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
        $color->name = $request->color;
        if ($color->save())
            return redirect(route('colors.index'))->with('success', "El Color $color->name fue editado ");
        else
            return redirect(route('colors.index'))->with('error', "No pudo realizarse la edicion");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $colorname = $color->name;
        if ($color->delete())
            return redirect(route('colors.index'))->with('success', "El Color $colorname fue eliminado satisfactoriamente");
        else
            return redirect(route('colors.index'))->with('error', "El Color $colorname no pudo ser eliminado");
    }
}
