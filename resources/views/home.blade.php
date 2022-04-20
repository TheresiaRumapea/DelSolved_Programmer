@extends('layouts.app')

@section('content')
         <!-- Main content -->
         <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (auth()->user()->image)
                                    <img class="profile-user-img img-fluid img-circle"  src="{{asset('/storage/profile/'.auth()->user()->image)}}" alt="User profile picture">
                                    @else
                                    <img class="profile-user-img img-fluid img-circle"  src="{{asset('/images/profile.png')}}" alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                                <p class="text-muted text-center">{{auth()->user()->email}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Topics Count:</b> <a class="float-right">{{count(auth()->user()->topics)}}</a>
                                    </li><br>
                                    <li class="list-group-item">
                                        <form action="{{route('user.photo.update', auth()->id())}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" class="form-control" name="profile_image" accept="image/*">
                                            <input type="submit" class="form-control" value="Update Photo">
                                        </form>
                                    </li>

                                </ul>

                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    {{auth()->user()->education}}
                                </p> --}}

{{--                                <hr>--}}

{{--                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>--}}

{{--                                <p class="text-muted">{{auth()->user()->country}}</p>--}}

                                {{-- <hr> --}}

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    {{auth()->user()->skills}}
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>

                                <p class="text-muted">{{auth()->user()->bio}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->






                    <div class="col-md-9">






                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                    @if (count($discussions) >0)

                                        <!-- Post -->

                                        <div>
                                            <table  class="table table-bordered">
                                                @foreach ($discussions as $discussion)
                                                <tr>
                                                    <td class="text-primary txt">
                                                        <a href="/client/topic/{{ $discussion->id }}">
                                                            {{ $discussion->title }}
                                                        </a>
                                                    </td>
                                                    <td >{{ $discussion->created_at }}</td>
                                                    <td>
                                                        <div>{{$discussion->replies->count()}} replies</div>
                                                        <div>{{$discussion->views}} views</div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn" href="/home/edit/{{ $discussion->id }}"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                        <a class="btn alert_notiftopic" href="/home/delete/{{ $discussion->id }}"><i class="fa-solid fa-trash-can text-danger "></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>

                                        @else
                                        <h3>No Discussions found!</h3>
                                        @endif



                                    </div>










                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">


                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">


                                        <form action="{{route('user.update', auth()->id())}}" method="POST" class="form-horizontal">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <input value="{{ auth()->user()->name }}" type="text" class="form-control" id="inputName" name="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <input value="{{ auth()->user()->email }}" type="email" class="form-control" id="inputEmail" name="email" required>
                                                </div>
                                            </div>

{{--                                            value="{{auth()->user()->phone}}"--}}

                                            <div class="form-group row">
                                                <label for="phone"   class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input value="{{ auth()->user()->phone }}" type="text" class="form-control" name="phone">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Profession</label>
                                                <div class="col-sm-10">
                                                    <input value="{{ auth()->user()->profession }}" type="text " class="form-control" name="profession">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                <div class="col-sm-10">
                                                    <input value="{{ auth()->user()->skills }}" type="text " class="form-control" name="skills"  >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Your Bio</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="bio">{{ auth()->user()->bio }}</textarea>
                                                </div>
                                            </div>

                                            {{-- <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Education</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control"  name="education">{{ auth()->user()->education }}</textarea>
                                                </div> --}}
                                            {{-- </div> --}}
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Update details</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

@endsection
