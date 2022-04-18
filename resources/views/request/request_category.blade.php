@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-lg-12 table-responsive">
                        <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                            REQUEST CATEGORY
                        </h4>
                    </div>

                </div>


                {{-- input title category request --}}
                <div class="mt-3 mb-3">
                    <form action="{{ route('request.category.store') }}", method="post">
                        @csrf
                        <label class="mb-0" for="">Category Title <span class="text-danger">*</span></label>
                        <input name="request_category_name" class="col-lg-12 table-responsive mb-2" type="text">
                        <label class="mt-0" for="">Category Description</label>
                        <input name="request_category_desc" class="col-lg-12 table-responsive" type="text">
                        <button class="btn btn-primary mt-3" type="submit">Request</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
