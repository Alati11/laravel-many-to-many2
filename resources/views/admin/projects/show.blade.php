@extends('layouts.app')

@section('content')
    
    <section>
        <div class="container">
            <div class="row">
                <div class="card card-player card-tennis">
                    <div class="container">
                        <h2>{{ $project->title}}</h2>
                    </div>
                    <ul>
                        <li><img src="{{ asset($project->thumb) }}"></li>
                        <li>{{$project->slug}}</li>
                        <li><p>{{$project->description}}</p></li>
                        <li><p>{{optional($project->type)->name}}</p></li>
                        

                        @foreach ($project->technologies as $tech)
                        <li class="badge rounded-pill text-bg-primary">{{ $tech->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection 