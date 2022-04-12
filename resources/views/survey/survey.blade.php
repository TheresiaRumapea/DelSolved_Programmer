@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-lg-12">
      <div class="col-lg-12">
        <div class="row">

          <div class="col-lg-12 table-responsive mb-5 border bg-light" ">
            <span>Dibuat oleh </span> <a href="/client/user/{{ $survey->user->id}}">{{ $survey->user->name}}</a>
            <h3>{{ $survey->title }}</h3>
            <p>{{ $survey->body }}</p>
            <a href="#">{{ $survey->link }}</a><br><br>
            <i class="fa fa-clock-o" aria-hidden="true"></i><span> berlaku hingga 20 maret 2022</span>

            <br><br>
            <div class="d-flex justify-content-center">
            <a href="{{ $survey->link }}"><button type="button" class="btn btn-primary ">Go To Survey</button></a><br><br>
            </div>

          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
