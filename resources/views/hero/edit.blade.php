@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-4 d-flex align-items-stretch">
                <div class="card shadow-lg w-100" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">Add a New Hero</h5>

                        <form action="{{route('hero.update', $hero->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group my-3">
                                <label for="name" class="mb-2">Hero's Name (Required)</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$hero->name}}"required>
                            </div>

                            <div class="input-group my-3">
                                <label for="gender" class="input-group-text" style="background-color:#121212;">Hero's Gender (Required)</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="Male" @if($hero->genre === 'Male') selected @endif>Male</option>
                                    <option value="Female" @if($hero->genre === 'Female') selected @endif>Female</option>
                                    <option value="Other" @if($hero->genre === 'Other') selected @endif>Other</option>
                                    <option value="Unknown" @if($hero->genre === 'Unknown') selected @endif>Unknown</option>
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label for="race" class="mb-2">Race (Required)</label>
                                <input type="text" class="form-control" id="race" name="race" value="{{ $hero->race }}" required>
                            </div>

                            <div class="form-group my-3" id="hero-description">
                                <label for="description" class="mb-2">Hero's Description (Required)</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{$hero->description}}</textarea>
                            </div>

                            <div class="input-group mt-4 mb-3" id="faction-selector">
                                <label for="faction" class="input-group-text" style="background-color:#121212;">Hero's Faction (required)</label>
                                <select class="form-select" id="faction" name="faction">
                                    @foreach($factions as $faction)
                                        <option value="{{$faction->id}}" @if($faction->id === $hero->faction->id) selected @endif>{{$faction->universe->name}} - {{$faction->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="button" class="btn btn-primary my-3" id="new-faction-button">Add a Faction</button>

                            <div class="form-group my-3" id="new-faction-form" style="display: none;">
                                <label for="new-faction" class="mt-2 mb-2">New Faction Name</label>
                                <input type="text" class="form-control" id="new-faction" name="new-faction">
                            </div>

                            <div class="input-group mt-4 mb-3" id="universe-selector" style="display: none;">
                                <label for="universe" class="input-group-text" style="background-color:#121212;">Faction's Universe (required)</label>
                                <select class="form-select" id="universe" name="universe">
                                    @foreach($universes as $universe)
                                        <option value="{{$universe->id}}" @if($universe->id === $hero->faction->universe->id) selected @endif>{{$universe->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="button" class="btn btn-primary my-3" id="new-universe-button" style="display: none;">Add a Universe</button>

                            <div class="form-group my-3" id="new-universe-form" style="display: none;">
                                <label for="new-universe" class="mt-2 mb-2">New Universe Name</label>
                                <input type="text" class="form-control" id="new-universe" name="new-universe">
                            </div>

                            <div class="input-group mt-4 mb-3" id="weapon-selector">
                                <label for="weapon" class="input-group-text" style="background-color:#121212;">Hero's Weapon</label>
                                <select class="form-select" id="weapon" name="weapon">
                                    <option>No Weapon</option>
                                    @foreach($weapons as $weapon)
                                        <option value="{{$weapon->id}}" @foreach($hero->weapon as $heroWeapon)
                                            @if($weapon->id === $heroWeapon->id) selected @endif @endforeach>{{$weapon->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="button" class="btn btn-primary my-3" id="new-weapon-button">Add a Weapon</button>

                            <div id="new-weapon-form" style="display: none">
                                <div class="form-group my-3">
                                    <label for="new_weapon_name" class="mt-2">Weapon Name</label>
                                    <input type="text" class="form-control" id="new_weapon_name" name="new_weapon_name">
                                </div>
                                <div class="form-group my-3">
                                    <label for="new_weapon_type" class="mt-2">Weapon Type</label>
                                    <input type="text" class="form-control" id="new_weapon_type" name="new_weapon_type">
                                </div>
                            </div>

                            @if(file_exists(storage_path('app/public/heroes/' . $hero->id .'.avif')))
                                <br><picture>
                                    <source srcset="/storage/heroes/{{$hero->id}}.avif" type="image/avif">
                                    <source srcset="/storage/heroes/{{$hero->id}}.webp" type="image/webp">
                                    <img src="/storage/heroes/{{$hero->id}}.jpg" alt="Picture of {{$hero->name}}"
                                         class="card-img-top img-fluid my-3" style="max-width: 50%; object-fit: cover; object-position: center;" loading="lazy"/>
                                </picture>
                            @endif
                            <div class="form-group my-3">
                                <label for="image" class="mb-2">Image (Optional)</label><br>
                                <input type="file" class="form-control" id="image" name="image" >
                            </div>

                            <button type="submit" class="btn btn-primary my-3">Add Hero</button>
                    </div>
                </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/createHeroForm.js') }}"></script>
@endsection


