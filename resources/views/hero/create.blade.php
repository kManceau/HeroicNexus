@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-4 d-flex align-items-stretch">
                <div class="card shadow-lg w-100" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">Add a New Hero</h5>

                        <form action="/hero/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label for="name" class="mb-2">Hero's Name (Required)</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="input-group my-3">
                                <label for="gender" class="input-group-text" style="background-color:#121212;">Hero's Gender (Required)</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                    <option value="Unknown">Unknown</option>
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label for="race" class="mb-2">Race (Required)</label>
                                <input type="text" class="form-control" id="race" name="race" required>
                            </div>

                            <div class="form-group my-3">
                                <label for="description" class="mb-2">Hero's Description (Required)</label>
                                <textarea
                                    class="form-control" id="description" name="description" rows="3"
                                    required></textarea>
                            </div>

                            <div class="input-group mt-4 mb-3" id="faction-selector">
                                <label for="faction" class="input-group-text" style="background-color:#121212;">Hero's Faction (required)</label>
                                <select class="form-select" id="faction" name="faction">
                                    @foreach($factions as $faction)
                                        <option value="{{$faction->id}}">{{$faction->universe->name}} - {{$faction->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--                            <div class="form-group my-3">--}}
                            {{--                                <label for="faction_text" class="mt-2">Faction (Text)</label>--}}
                            {{--                                <input type="text" class="form-control" id="faction_text" name="faction_text">--}}
                            {{--                            </div>--}}

                            <div class="form-group my-3">
                                <label for="image" class="mb-2">Image (Optional)</label><br>
                                <input type="file" class="form-control" id="image" name="image" >
                            </div>

                            <div class="input-group mt-4 mb-3" id="weapon-selector">
                                <label for="weapon" class="input-group-text" style="background-color:#121212;">Hero's Weapon</label>
                                <select class="form-select" id="weapon" name="weapon">
                                    <option value="">No Weapon</option>
                                    @foreach($weapons as $weapon)
                                        <option value="{{$weapon->id}}">{{$weapon->name}}</option>
                                    @endforeach
                                </select>
                            </div>

{{--                            <div class="form-group my-3">--}}
{{--                                <label for="weapons_name" class="mt-2">Weapon Name</label>--}}
{{--                                <input type="text" class="form-control" id="weapons_name" name="weapons_name">--}}
{{--                            </div>--}}
{{--                            <div class="form-group my-3">--}}
{{--                                <label for="weapon_type" class="mt-2">Weapon Type</label>--}}
{{--                                <input type="text" class="form-control" id="weapon_type" name="weapon_type">--}}
{{--                            </div>--}}



{{--                            <div class="form-group my-3">--}}
{{--                                <label for="universe_select">Universe (Select)</label>--}}
{{--                                <select--}}
{{--                                    class="form-control" id="universe_select" name="universe_select">--}}
{{--                                    <!-- Options should be dynamically loaded -->--}}
{{--                                    <option value="marvel">Marvel</option>--}}
{{--                                    <option value="dc">DC</option>--}}
{{--                                </select>--}}
{{--                                <label for="universe_text" class="mt-2">Universe (Text)</label>--}}
{{--                                <input--}}
{{--                                    type="text" class="form-control" id="universe_text" name="universe_text">--}}
{{--                            </div>--}}

                            <button type="submit" class="btn btn-primary my-3">Add Hero</button>
                    </div>
                </div>
@endsection


