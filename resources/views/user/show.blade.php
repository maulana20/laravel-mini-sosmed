@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <h3 class="card-header">{{ $user->name }}</h3>
            <div class="card-body">
                <label>Email:</label>
                <p>{{ $user->email }}</p>
                
                @if (auth()->check() && auth()->id() != $user->id)
                    <friend-button :user_id="{{ $user->id }}"></friend-button>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
