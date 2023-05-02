@extends('templates.index')

@section('main')

    <header class="sub-header"><h5 class="title"><strong>{{ $user->username }}</strong></h5></header>

    <div class="row">
        <div class="col-3 d-flex flex-column ps-0 pt-3" style="box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);">
            <div class="mb-4">
                @include('components.userprofile')
            </div>
            <div class="mb-4">
                @if (auth()->user()->username === $user->username)
                    <button type="button" class="btn btn-secondary w-100" href="{{ url("setting/profile") }}">Edit Profile</button>
                @endif
            </div>
        </div>
        <div class="col-9 pt-3">
            
        </div>
    </div>

@endsection