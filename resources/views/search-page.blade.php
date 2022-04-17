@extends('layouts.app')

@section('content')
@if(!(count($dataCategories) == 0 and count($dataForums) == 0 and count($dataDiscussions) == 0 and count($dataSurveys) == 0))
<div class="col-lg-12 table-responsive mb-5 p-3 rounded" style="border: 1px solid #C4C4C4">
  <h4  class="btn-primary p-3">CATEGORY</h4>
  @foreach ($dataCategories as $category)
    <h5 ><a class="text-dark" href="/category/overview/{{ $category->id }}">{{ $category->title }}</a></h5>
  @endforeach
</div>

<div class="col-lg-12 table-responsive mb-5 p-3 rounded" style="border: 1px solid #C4C4C4">
    <h4 class="btn-primary p-3" >FORUM</h4>
    @foreach ($dataForums as $forum)
      <h5><a class="text-dark" href="/forum/overview/{{ $forum->id }}">{{ $forum->title }}</a></h5>
    @endforeach
  </div>

  <div class="col-lg-12 table-responsive mb-5 p-3 rounded" style="border: 1px solid #C4C4C4">
    <h4 class="btn-primary p-3" >TOPIC</h4>
    @foreach ($dataDiscussions as $discussion)
      <h5><a class="text-dark" href="/client/topic/{{ $discussion->id }}">{{ $discussion->title }}</a></h5>
    @endforeach
  </div>

  <div class="col-lg-12 table-responsive mb-5 p-3 rounded" style="border: 1px solid #C4C4C4">
    <h4 class="btn-primary p-3" >SURVEY</h4>
    @foreach ($dataSurveys as $survey)
      <h5><a class="text-dark" href="/survey/{{ $survey->id }}">{{ $survey->title }}</a></h5>
    @endforeach
  </div>
@else
  <h1>NOT FOUND</h1>
@endif

@endsection
