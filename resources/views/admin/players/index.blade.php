@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif

    <section>
        <div class="container ">
            <h1 class="title">ATP RANKINGS</h1>
        </div>
    </section>
    <section>
        <div class="container">
            <table class="table-top100">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Age</th>
                        <th>Weight </th>
                        <th>Height</th>
                        <th>Points</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($players as $player)
                        <tr>
                            <td>{{$player->ranking}}</td>
                            <td>
                                <a class="text-decoration-none" href="{{ route('admin.players.show',$player)}}"> 
                                    {{ $player->name }}
                                </a>
                            </td>
                            <td><img src="{{$player->image}}" alt="Image Player"></td>
                            <td>{{$player->age}}</td>
                            <td>{{$player->weight}} kg</td>
                            <td>{{$player->height}} cm</td>
                            <td>{{$player->points}}</td>
                            <td>{{$player->country}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.players.edit', $player)}}">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.players.show', $player)}}">Details</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.players.destroy', $player)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger" type="submit" value="Delete" >
                                </form>
                            </td>
                        </tr>
                        
                    @empty
                        <tr>
                            <td>Not Player</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection