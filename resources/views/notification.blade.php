@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Description</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Read</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notifs as $notif)
            @if($notif->status[auth()->id() - 1]->is_delete === 0)
            <tr>
{{--                @dd($notif->status[2])--}}
                <td>{{ $notif->description }}</td>
                <td>{{ $notif->user->name }}</td>
                <td>{{ $notif->user->email }}</td>
                <td>

                        @if ($notif->status[auth()->id() - 1]->is_read === 0)
                            <a href="{{ route('notif-read', $notif->status[auth()->id() - 1]->id) }}" class="btn btn-success">mark as read</a>
                        @else
                            <a href="" class="btn btn-secondary" disabled>mark as read</a>
                        @endif

                </td>
                <td>
                    <a href="{{ route('notif-delete', $notif->status[auth()->id() - 1]->id) }}" class="text-danger alert_notifnotification"><i class="fas fa-trash text-danger"></i></a>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
