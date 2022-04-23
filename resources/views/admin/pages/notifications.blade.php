@extends('layouts.dashboard')


@section('content')


<style>
  .grey-text{
    /* color:rgba(85, 83, 83, 0.075);  */
    color: rgb(156, 154, 154);
  }
</style>
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

              <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                <li><i class="fa fa-users"></i>Notifications</li>
              </ol>
            </div>
          </div>

          <div class="row">

            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><i class="fa fa-flag-o red"></i><strong>Unread Notifications</strong></h2>
                  <div class="panel-actions">
                    <a href="/dashboard/home" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                    <a href="/dashboard/home" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="/dashboard/home" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
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


                </div>

              </div>

            </div>

            </div>
            <!--/col-->

          </div>



        </section>


      </section>
      <!--main content end-->
@endsection
