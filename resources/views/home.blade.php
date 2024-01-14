@extends('layouts.app')
@section('content')

<div class="jumbotron welcome p-5 rounded-3">
    <div class="container py-1">
        <h1 class="display-5 fw-bold">
            Benvenuto! Questi sono i miei progetti!
        </h1>

        <p class="col-md-8 fs-4">In questo portale troverai i progetti che ho sviluppato
             e le tecnlogie che ho usato per realizzarli.</p>
        <a class="btn btn-home button" type="button" href="{{ route('register') }}">{{ __('Registrati  ') }}</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card-text-passion card-tennis">
                    <p>“La disumanità del computer sta nel fatto che, una volta programmato e messo in funzione, 
                        si comporta in maniera perfettamente onesta.”</p>
                     <p>ISAAC ASIMOV</p>   
                </div>
            </div>

            <div class="col-3">
                <div class="card-text-passion card-tennis">
                    <p>“I bravi programmatori sanno cosa scrivere. I migliori sanno cosa riscrivere.”</p>
                    <p> ERIC STEVEN RAYMOND</p>
                </div>
            </div>
                
            <div class="col-3">
                <div class="card-text-passion card-tennis">
                    <p>"Per realizzare grandi cose, non dobbiamo solo agire, ma anche sognare; non solo progettare ma anche credere."</p>
                    <p>ANONIMO</p>
                </div>
            </div>

            <div class="col-3">
                <div class="card-text-passion card-tennis">
                    <p>“Se il computer è un dio, è un dio del Vecchio Testamento con un sacco di leggi e nessuna pietà.”</p>
                    <p>JOSEPH CAMPBELL</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection