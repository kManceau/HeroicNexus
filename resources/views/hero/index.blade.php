@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($heroes as $hero)
                <div class="col-md-3 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-lg w-100" style="border-radius: 15px; overflow: hidden;">
                        @auth
                        @if($hero->created_by == Auth::user()->id)
                            <div class="card-header d-flex justify-content-end">
                                <form action="{{ route('hero.edit', $hero) }}" method="GET">
                                    @csrf
                                    <button type="submit" style="background:none;border:none;" title="Edit">📝️</button>
                                </form>
                                <form action="{{ route('hero.destroy', $hero) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:none;border:none;" title="Delete">❌️</button>
                                </form>
                            </div>
                        @endif
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $hero->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $hero->race }} @if($hero->gender)
                                    | {{ $hero->gender }}
                                @endif</h6>
                            <hr>
                            <picture>
                                <source srcset="/storage/heroes/{{$hero->id}}.avif" type="image/avif">
                                <source srcset="/storage/heroes/{{$hero->id}}.webp" type="image/webp">
                                <img src="/storage/heroes/{{$hero->id}}.jpg" alt="Picture of {{$hero->name}}"
                                     class="card-img-top img-fluid" style="max-height: 200px; object-fit: cover; object-position: center;" loading="lazy"/>
                            </picture>
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

            <div class="col-md-3 mb-4 d-flex align-items-center justify-content-center">
                <a href="/hero/create" type="button" class="btn btn-primary btn-lg">
                    Add Another Hero
                </a>
            </div>
@endsection


