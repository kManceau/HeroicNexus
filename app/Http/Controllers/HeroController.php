<?php

namespace App\Http\Controllers;

use App\Models\Faction;
use App\Models\Hero;
use App\Models\Universe;
use App\Models\Weapon;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $universes = Universe::orderBy('name', 'ASC') ->get();
        $weapons = Weapon::orderBy('name', 'ASC')->get();
        return view('hero.create', compact('weapons', 'factions', 'universes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ImageService $imageService)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'description' => 'required',
        ]);
        $hero = new Hero([
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'race' => $request->get('race'),
            'description' => $request->get('description'),
        ]);

        $faction = $this->handleFaction($request);
        $hero->faction()->associate($faction);
        $weapon = $this->handleWeapon($request);
        $hero->save();
        $hero->weapon()->attach($weapon);
        if($request->hasFile('image')) {
            $imageService->uploadImages($request->file('image'), $hero->id, 'heroes');
        }
        return redirect('/hero')->with('message', 'Hero created!');
    }

    /**
     * Handle the Faction Form from Create Method
     */
    private function handleFaction(Request $request)
    {
        if($request->get('faction')){
            $faction = Faction::find($request->get('faction'));
        } else{
            $faction = new Faction([
                'name' => $request->get('new-faction'),
            ]);
            if($request->get('universe')){
                $universe = Universe::find($request->get('universe'));
            } else{
                $universe = new Universe([
                    'name' => $request->get('new-universe'),
                ]);
                $universe->save();
            }
            $faction->universe()->associate($universe);
            $faction->save();
        }
        return $faction;
    }

    /**
     * Handle the Weapon Form from Create Method
     */
    private function handleWeapon(Request $request)
    {
        if($request->get('weapon')){
            $weapon = Weapon::find($request->get('weapon'));
        } else{
            $weapon = new Weapon([
                'name' => $request->get('new_weapon_name'),
                'type' => $request->get('new_weapon_type')
            ]);
            $weapon->save();
        }
        return $weapon;
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
        $hero = Hero::find($id);
        $factions = Faction::join('universe', 'faction.universe_id', '=', 'universe.id') ->orderBy('universe.name', 'ASC') ->select('faction.*') ->get();
        $universes = Universe::orderBy('name', 'ASC') ->get();
        $weapons = Weapon::orderBy('name', 'ASC')->get();
        return view('hero.edit', compact('hero', 'factions', 'universes', 'weapons'));
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
    public function destroy(string $id, ImageService $imageService)
    {
        $hero = Hero::find($id);
        if($hero->created_by === Auth::user()->id){
            $imageService->deleteImages($id, 'heroes');
            $hero->delete();
            return redirect()->back()
                ->with('message', 'Hero deleted!');
        } else{
            return redirect()->back()
                ->with('message', 'You cannot delete this hero!');
        }
    }
}
