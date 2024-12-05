@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <p>{{ $hero->name }} ({{ $hero->gender }} - {{ $hero->race }})</p>
                    <p>{{ $hero->description }}</p>
                    <p>{{ $hero->faction->name }} - {{ $hero->faction->universe->name }}</p>
                    @foreach($hero->weapon as $weapon)
                        <p>{{ $weapon->name }} - {{ $weapon->type }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
