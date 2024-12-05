@extends('layouts.app')

@section('content')
    <div class="container d-flex">
        @foreach($heroes as $hero)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hero->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $hero->race }}</h6>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $hero->gender }}</h6>
                            <p class="card-text mt-3">
                                Universe : {{ $hero->faction->universe->name }}<br>
                                Faction : {{ $hero->faction->name }}
                            </p>
                            <p class="card-text">
                                @if($hero->weapon->count() === 1)
                                    Weapon :
                                @else
                                    Weapons :
                                @endif
                                @foreach($hero->weapon as $weapon)
                                    <br>{{ $weapon->name }} - {{ $weapon->type }}
                                @endforeach
                            </p>

                            <p class="card-text">
                                {{ $hero->description }}
                            </p>
{{--                            <a href="#" class="card-link">Another link</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@endsection
