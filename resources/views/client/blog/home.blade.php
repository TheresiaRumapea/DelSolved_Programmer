@extends('layouts.app')
<link rel="stylesheet" href="{{asset('blog/styles.css')}}">
@section('content')

<!-- Main Content-->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 ">
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                    <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 24, 2021
                </p>
            </div>
            <hr />
            <div class="post-preview">
                <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2></a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 18, 2021
                </p>
            </div>
            <hr />
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Science has not yet mastered prophecy</h2>
                    <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next ten.</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on August 24, 2021
                </p>
            </div>
            <hr />
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">Failure is not an option</h2>
                    <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on July 8, 2021
                </p>
            </div>
            <hr />
            <!-- Pager-->
            <div class="clearfix"><a class="btn btn-primary float-right" href="#!">Older Posts →</a></div>
        </div>
        <div class="col-md-2 col-lg-4">
            <div class="card">
                <article class="card-group-item">
                    <header class="card-header"><h6 class="title">Blog Categories </h6></header>
                    <div class="filter-content">
                        <div class="list-group list-group-flush">
                          @if(count($categories) > 0)
                            @foreach ($categories as $category)
                            <a href="#" class="list-group-item">{{$category->title}}<span class="float-right badge badge-light round">142</span> </a>
                            @endforeach
                          @else

                          @endif

                        </div>  <!-- list-group .// -->
                    </div>
                </article> <!-- card-group-item.// -->
                <article class="card-group-item">
                    <header class="card-header"><h6 class="title">Del Solved</h6></header>
                    <div class="filter-content">

                    </div>
                </article> <!-- card-group-item.// -->
            </div> <!-- card.// -->

        </div>
    </div>
</div>
<hr />
@endsection
