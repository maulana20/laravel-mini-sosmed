@extends('layouts.app')

@section('content')

<h3 class="page-header">Browse Users</h3>

<div class="row">
    
    @foreach($users as $user)
        
        <div class="col-md-3">
            <div class="card">
                <h3 class="card-header">{{ $user->name }}</h3>
                <div class="card-body">
                    <label>Email:</label>
                    <p>{{ $user->email }}</p>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-xs">View Profile</a>
                </div>
            </div>
        </div>
        
    @endforeach
    
</div>
@endsection
