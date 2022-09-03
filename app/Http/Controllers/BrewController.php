<?php

namespace App\Http\Controllers;

use App\Models\Brew;
use Illuminate\Http\Request;

class BrewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brews = Brew::all();

        return view('brew.index', ['brews' => $brews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brew.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $temp = $request->input('temperature');

        $brew = Brew::create([
            'name' => $name,
            'temperature' => $temp
        ]);

        if($brew->exists) 
        {
            return redirect()->route('brew.index');
        }else{
            abort(500, 'something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brew  $brew
     * @return \Illuminate\Http\Response
     */
    public function show(Brew $brew)
    {
        $brew = Brew::find($brew->id);
        return view('brew.show', ['brew' => $brew]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brew  $brew
     * @return \Illuminate\Http\Response
     */
    public function edit(Brew $brew)
    {
        $brew = Brew::find($brew->id);
        
        return view('brew.edit', ['brew' => $brew]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brew  $brew
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brew $brew)
    {
        $brew->name = $request->input('name');
        $brew->temperature = $request->input('temperature');

        if($brew->save())
        {
            return redirect()->route('brew.index');
        }else{
            abort(500, 'update failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brew  $brew
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brew $brew)
    {
        if($brew->delete())
        {
            return redirect()->route('brew.index');
        }else{
            abort(500, 'delete failed');
        }
    }
}
