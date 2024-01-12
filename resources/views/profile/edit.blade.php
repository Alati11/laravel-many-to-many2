@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="fs-4 text-light my-4">
        {{ __('Profile') }}
    </h2>
    <div class="card card-profile card-tennis p-4 mb-4 rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card card-profile card-tennis p-4 mb-4 rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card card-profile card-tennis p-4 mb-4  rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
