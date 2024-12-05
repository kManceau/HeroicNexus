@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($heroes as $hero)
                <div class="col-md-3 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-lg w-100" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $hero->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $hero->race }} @if($hero->gender)
                                    | {{ $hero->gender }}
                                @endif</h6>
                            <hr>
                            <p class="card-text">
                                <strong>Universe:</strong> {{ $hero->faction->universe->name }}<br>
                                <strong>Faction:</strong> {{ $hero->faction->name }}
                            </p>
                            <p class="card-text">
                                @if($hero->weapon->count() !== 0)
                                    @if($hero->weapon->count() === 1)
                                        <strong>Weapon:</strong>
                                    @else
                                        <strong>Weapons:</strong>
                                    @endif
                                    @foreach($hero->weapon as $weapon)
                                        <br>{{ $weapon->name }} - {{ $weapon->type }}
                                    @endforeach
                                @endif
                            </p>
                            <hr>
                            <p class="card-text mt-auto">{{ $hero->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


