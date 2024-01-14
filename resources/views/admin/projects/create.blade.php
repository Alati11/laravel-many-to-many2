@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Aggiungi nuovo progetto</h1>
        <form class="table-top100 edit-player" action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nome Progetto</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Nome..." value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">URL immagine</label>
                <input type="text" class="form-control" name="thumb" id="thumb" value="{{old('thumb')}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Descrizione del progetto">{{old('description')}}</textarea>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Categoria</label>
                <select name="type_id" class="form-control" id="type_id">
                  <option>Seleziona una categoria</option>
                  @foreach($types as $type)
                    <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                  @endforeach
                </select>
              </div>

            <div class="form-group mb-3">
                <p>Seleziona i tag:</p>
                <div class="d-flex flex-wrap gap-4 ">
                    @foreach ($technologies as $tech)
                    <div class="form-check me-3">
                        <label class="form-check-label" for="tech-{{$tech->id}}">
                            {{$tech->name}}
                        </label>
                        <input name="techs[]" class="form-check-input" type="checkbox" value="{{$tech->id}}" id="tech-{{$tech->id}}" @checked(in_array($tech->id, old('techs', [])))>
                    </div>    
                @endforeach
                </div>
              </div>

            <div>
                <button type="submit" class="button btn-add-player">Crea Progetto</button>
            </div>
        </form>
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection