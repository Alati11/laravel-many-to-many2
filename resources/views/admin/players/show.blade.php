@extends('layouts.app')

@section('content')
    
    <section>
        <div class="container">
            <div class="row">
                <div class="card card-player card-tennis">
                    {{-- <img src="{{$player->image}}" alt="Player Image"> --}}
                    <img class="img-player" src="{{ asset('images/Federer_01-1080x675.png') }}" alt="Default Image">
                    <div class="container">
                        <h2>{{ $player->name}}</h2>
                    </div>
                    <ul>
                        <li>Ranking - {{$player->ranking}}</li>
                        <li>Age - {{$player->age}}</li>
                        <li>Weight kg - {{$player->weight}}</li>
                        <li>Height cm - {{$player->height}}</li>
                        <li>Official Points - {{$player->points}}</li>    
                        <li>Country -{{$player->country}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection 