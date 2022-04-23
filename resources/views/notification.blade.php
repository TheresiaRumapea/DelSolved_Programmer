@extends('layouts.app')

@section('content')

<style>
    .grey-text{
      /* color:rgba(85, 83, 83, 0.075);  */
      color: rgb(156, 154, 154);
    }
  </style>

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

            @isset($notif->status[auth()->id() - 1])

            @if($notif->status[auth()->id() - 1]->is_delete === 0)
                <tr>
                    {{--                @dd($notif->status[2])--}}
                    @if ($notif->status[auth()->id() - 1]->is_read === 0)
                        <td>{{ $notif->description }}</td>
                        <td>{{ $notif->user->name }}</td>
                        <td>{{ $notif->user->email }}</td>
                        <td><a href="{{ route('notif-read', $notif->status[auth()->id() - 1]->id) }}" class="btn btn-success">mark as read</a></td>
                    @else
                        <td class="grey-text">{{ $notif->description }}</td>
                        <td class="grey-text">{{ $notif->user->name }}</td>
                        <td class="grey-text">{{ $notif->user->email }}</td>
                        <td><a href="" class="btn btn-secondary" disabled>mark as read</a></td>
                    @endif

                    <td>
                        <a href="{{ route('notif-delete', $notif->status[auth()->id() - 1]->id) }}" class="text-danger alert_notifnotification"><i class="fas fa-trash text-danger"></i></a>
                    </td>
                </tr>
            @endif

            @endisset
        @endforeach
        </tbody>
    </table>
@endsection
