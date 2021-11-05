@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <h3 class="card-header">Your notifications</h3>
                <div class="card-body">
                    <ul class="list-group">
                        
                        @foreach($notifications as $notif)
                            
                            <li class="list-group-item">
                                @include('layouts.notification.'.getNotificationViewPart($notif->type))
                            </li>
                            
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
