@extends('layouts.dashboard')

@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i>REQUEST</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/dashboard/home">Home</a></li>
                        <li><i class="fa fa-users"></i>Request</li>
                    </ol>
                </div>
            </div>

            <div>
                <h4 class="ml-3">CATEGORIES REQUEST</h5>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($request_categories as $category)
                    <tr>
                        <td>{{ $category->user->name }}</td>
                        <td>{{ $category->category_title }}</td>
                        <td>{{ $category->category_desc }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('accept_category', $category->id) }}">Accept</a>
                            <a class="btn btn-danger" href="{{ route('reject_category', $category->id) }}">Reject</a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <h4 class="ml-3">FORUMS REQUEST</h5>
                <table class="table thead-light">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Forum Name</th>
                        <th scope="col">Forum Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($request_forums as $forum)
                    <tr>
                        <td>{{ $forum->user->name }}</td>
                        <td>{{ $forum->forum_title }}</td>
                        <td>{{ $forum->forum_desc }}</td>
                        <td>{{ $forum->category->title }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('accept_forum', $forum->id) }}">Accept</a>
                            <a class="btn btn-danger" href="{{ route('reject_forum', $forum->id)}}">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </section>
    </section>
    <!--main content end-->
@endsection
