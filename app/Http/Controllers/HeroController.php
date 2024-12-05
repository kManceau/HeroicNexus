<?php

namespace App\Http\Controllers;

use App\Models\Faction;
use App\Models\Hero;
use App\Models\Weapon;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = Hero::orderBy('name', 'ASC')->get();
        return view('hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $factions = Faction::join('universe', 'faction.universe_id', '=', 'universe.id') ->orderBy('universe.name', 'ASC') ->select('faction.*') ->get();
        $weapons = Weapon::orderBy('name', 'ASC')->get();
        return view('hero.create', compact('weapons', 'factions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'description' => 'required',
            'faction' => 'required',
        ]);
        $hero = new Hero([
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'race' => $request->get('race'),
            'description' => $request->get('description'),
        ]);
        $hero->faction()->associate($request->get('faction'));
        $hero->save();
        return redirect('/hero')->with('message', 'Hero created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
