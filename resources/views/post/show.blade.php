@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 col-lg-offset-1">
        <div class="card">
            <h3 class="card-header">{{ $post->user->name }}</h3>
            <div class="card-body">
                {{ $post->content }}
            </div>
            <div class="card-footer">
                <like :post="{{ $post }}"></like>
            </div>
        </div>
    </div>
</div>

@endsection
