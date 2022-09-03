<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Type;
use App\Models\Brew;
use Illuminate\Http\Request;

class CoffeeController extends Controller
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
        //get All coffee data
        $coffees = Coffee::all();
        return view('coffee.index', ['coffees' => $coffees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $brews = Brew::all();
        return view('coffee.create', ['types' => $types, 'brews' => $brews]);
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
        $bean = $request->input('bean');
        $type = $request->input('type');
        $brew = $request->input('brew');
        $price = $request->input('price');

        $coffee = Coffee::create([
            'name' => $name,
            'bean' => $bean,
            'type' => $type,
            'brew_type' => $brew,
            'price' => $price
        ]);

        if($coffee->exists) 
        {
            return redirect()->route('coffee.index');
        }else{
            abort(500, 'insert failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function show(Coffee $coffee)
    {
        $coffee = Coffee::find($coffee->id);
        return view('coffee.show', ['coffee' => $coffee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function edit(Coffee $coffee)
    {
        $types = Type::all();
        $brews = Brew::all();
        $coffee = Coffee::find($coffee->id);
        return view('coffee.edit', ['coffee' => $coffee, 'types' => $types, 'brews' => $brews]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coffee $coffee)
    {
        $coffee->name = $request->input('name');
        $coffee->bean = $request->input('bean');
        $coffee->type = $request->input('type');
        $coffee->brew_type = $request->input('brew');
        $coffee->price = $request->input('price');

        if($coffee->save())
        {
            return redirect()->route('coffee.index');
        }else{
            abort(500, 'update failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coffee  $coffee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coffee $coffee)
    {
        if($coffee->delete())
        {
            return redirect()->route('coffee.index');
        }else{
            abort(500, 'delete failed');
        }
    }
}
