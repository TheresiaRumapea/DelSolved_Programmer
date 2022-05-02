@extends('layouts.app')

@section('content')
<style>
    .fa-trash-can{
        font-size: 25px;
    }
</style>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8 table-responsive">
                    <h2 style="color:#333333"><b>SURVEY</b></h2>
                </div>
                @auth
                <div class="text-right col-lg-4 table-responsive">
                    <a href="/survey/showForm/"><i class="fa-solid fa-circle-plus pr-2"></i>Create Survey</a>
                    <a class="ml-3" href="/survey/self/{{ auth()->id() }}">My Survey</a>
                </div>
                @endauth
            </div>
        </div>

        <div class="col-lg-12">
            <div class="row">
                @foreach ($surveys as $survey)

                <div class="col-lg-12 table-responsive mb-5 p-3" style="border: 1px solid #C4C4C4">

                <div class="d-flex justify-content-between">
                    <span><i>Created by </i><a href="/client/user/{{ $survey->user->id}}">{{ $survey->user->name}}</a></span>

                @auth
                    @if (auth()->user()->is_admin)
                        <a href="survey/delete/{{ $survey->id }}" class ="alert_notifnotification"><i class="fa-solid fa-trash-can text-danger"></i></a>
                    @endif
                @endauth

                </div>

                    <h5><b>{{ $survey->title }}</b></h5>
                    <p>{{ Str::limit($survey->body, 50) }}</p>
                    <p style="margin-top: -10px;"><a href="#">{{ $survey->link }}</a></p>
                    <div class="align">
                        <span> <i class="fa fa-clock-o pr-2" aria-hidden="true"></i>Valid until {{ $survey->delete_at}}</span>
                        <a class="text-right btn btn-primary p-2 " href="/survey/{{ $survey->id }}">More<i class="fa-solid fa-arrow-right pl-2"></i></a>
                    </div>


                </div>

            @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
