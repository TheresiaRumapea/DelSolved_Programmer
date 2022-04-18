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


    <div class="row ml-1">

      <form class="mb-3" action="{{route('store.survey')}}" method="post">

        @csrf

        <p>Title <span class="text-danger">*</span></p>
        <input name="title" type="text">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <p>Description <span class="text-danger">*</span></p>
        <input name="body" type="text" class="deskripsi">
        @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <p>Tanggal akhir:</p>
        <input name="delete_at" type="date">
        @error('delete_at')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <p>Link Survey <span class="text-danger">*</span> </p>
        <input name="link" type="url">
        @error('link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br><br>

        <div class="d-flex justify-content-center">
          <button class="btn btn-primary" type="Submit">Submit</button>
        </div>

      </form>

    </div>
  </div>
@endsection
