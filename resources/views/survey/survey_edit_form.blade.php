@extends('layouts.app')

@section('content')
<style>

    p{
      font-weight: bold;
    }
    .row{

    }
    input{
      width: 1105px;
      /* padding: 5px; */
      border-radius: 5px;
    }
    .linkGoogleForm{
      color: blue;
      text-decoration: underline;
    }

    button{
      padding: 12px 25px;
    }
    .deskripsi{
      height: 90px;
    }
    @media screen and (max-width: 1200px) {
      /* rentang 768 px -> 1200 px */
      input{
        width: 500px;
      }
    }
    </style>

    <h3>EDIT SURVEY</h3>

    <div class="row">
      <form class="mb-3 ml-3" action="{{ route('store.edit', $survey->id) }}" method="post">

        @csrf

        <p>Title <span class="text-danger">*</span> </p>
          <input name="title" type="text" value="{{ $survey->title }}">
          @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <br><br>

        <p>Description <span class="text-danger">*</span></p>
        <input name="body" type="text" class="deskripsi" value="{{ $survey->body }} ">
        @error('body')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <p>Due Date <span class="text-danger">*</span></p>
        <input name="delete_at" type="date" value="{{$survey->delete_at}}" onfocus="this.min=new Date().toISOString().split('T')[0]">
        @error('delete_at')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <p>Survey Link <span class="text-danger">*</span></p>
        <input name="link" type="text" value="{{ $survey->link }}">
        @error('link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <button class="btn btn-primary" type="submit">Update</button>

      </form>
    </div>
  </div>
@endsection
