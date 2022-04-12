@extends('layouts.app')
@section('content')
      <!-- first section end -->
    </div>
    <div class="container">
      <nav class="breadcrumb">
        <a href="#" class="breadcrumb-item">Forum Categories</a>
        <a href="{{route('category.overview', $forum->category->id)}}" class="breadcrumb-item">{{$forum->category->title}}</a>
        <a href="#" class="breadcrumb-item">{{$forum->title}}</a>
        <span class="breadcrumb-item active">Edit Topic</span>
      </nav>

      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- Category one -->
            <div class="col-lg-12">
              <!-- second section  -->
              <h4 class="text-white bg-info mb-0 p-4 rounded">Edit Topic</h4>
            </div>
          </div>
        </div>
      </div>

      <form action="{{route('store.edit.discussion', $discussion->id)}}" class="mb-3" method="POST">
        @csrf
        <div class="form-group">
          <label for="title" class="mt-2">Topic Title <span class="text-danger">*</span> </label>
          <input type="text" name="title" class="form-control" value="{{ $discussion->title }}"/>
        </div>
        <div class="form-group">
          <label for="title" class="mt-2">Description </label>
          <textarea
            class="form-control"
            name="desc"
            id=""
            rows="10"
            required
          >{{ $discussion->desc }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-lg-5">
         Update
        </button>
      </form>
      <div></div>
      <p class="small">
        <a href="#">Have you forgotten your account details?</a>
      </p>
    </div>

@endsection