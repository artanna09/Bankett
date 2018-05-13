@extends('layouts.app')

@section('content')
<div id="profile">
    <div class="container profile-info"><img src="{{ asset('/storage/users/'. $user->picture)  }}" class="profila-bilde">
        <h1 class="profile_vu">{{ $user->name . ' ' . $user->surname }}</h1>
        <h3 class="profile_epasts">{{ $user->email }}</h3>
        <h3 class="profile_talrunis">{{ $user->phone }}</h3>
    </div>
</div> 
@endsection