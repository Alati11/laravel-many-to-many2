@extends('layouts.app')

@section('content')


<div class="container">

    {{-- <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    
        {{ __('You are logged in!') }}
    </div> --}}

    <h2 class="my-4 title">
        Tutti i Progetti
    </h2>

    <div class="row p-5">
        <table class="table-top100">
            <thead class="table-info">
                <tr class="text-center title">
                    <th class="col">N</th>
                    <th class="col">IMG</th>
                    <th class="col">Titolo</th>
                    <th class="col">Descrizione</th>
                    <th class="col"></th>
                    <th class="col"></th>
                    <th classe="col"><a class="btn btn-home button" type="button" href="{{ route('admin.projects.create') }}">{{ __('Aggiungi') }}</a>
                    </th>
                </tr>
            </thead>
        
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th> {{$project->id}}</th>

                        <td><img class="img-table" src="{{$project->thumb}}"></td>
                        <td>
                            <a class="text-decoration-none" href="{{ route('admin.projects.show',$project)}}"> 
                                {{ $project->title }}
                            </a>
                        </td>
                        <td>{{$project->description}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.projects.edit', $project)}}">Modifica</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.projects.show', $project)}}">Dettagli</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.projects.destroy', $project)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <input class="btn btn-danger" type="submit" value="Delete" >
                            </form>
                        </td>
                    </tr>
                    
                @empty
                    <tr>
                        <td>Nessun Progetto</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
</div>
@endsection