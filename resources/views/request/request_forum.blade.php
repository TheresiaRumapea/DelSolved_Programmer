@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-lg-12 table-responsive">
                        <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                            REQUEST FORUM
                        </h4>
                    </div>

                </div>

                {{-- input title category request --}}
                <div class="mt-3 mb-3">
                    <form action="{{ route('request.forum.store') }}", method="post">
                        @csrf
                        <label class="mb-0" for="">Forum Title <span class="text-danger">*</span> </label>
                        <input name="request_forum_name" class="col-lg-12 table-responsive" type="text">
                        <label class="mb-0 mt-3" for="">Description</label>
                        <input name="request_forum_desc" class="col-lg-12 table-responsive mb-2" type="text">

                        <label for="" class="mt-3" >Category <span class="text-danger">*</span></label>
                        <br>
                        <select name="request_forum_cat" id="">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-primary mt-3" type="submit">Request</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
