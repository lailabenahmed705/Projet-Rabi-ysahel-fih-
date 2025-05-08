@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h3>Mes notifications</h3>

    @if ($notifications->count())
        <ul class="list-group">
            @foreach ($notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center {{ is_null($notification->read_at) ? 'list-group-item-warning' : '' }}">
                    <div>
                        <strong>{{ $notification->data['title'] }}</strong><br>
                        <small>{{ $notification->data['body'] }}</small><br>
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                    @if (is_null($notification->read_at))
                        <form action="{{ route('medical.notifications.read', $notification->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-primary">Marquer comme lue</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune notification pour le moment.</p>
    @endif
</div>
@endsection
