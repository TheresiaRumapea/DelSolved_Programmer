@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <div class="col-lg-12 table-responsive">
                            <!-- second section  -->
                            <a href="{{route('category.overview', $category->id)}}">
                                <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                                    {{$category->title}}
                                </h4>
                            </a>
                            <table class="table table-striped table-responsive table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Forum</th>
                                        <th scope="col">Topics</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @if (count($category->forums) > 0)
                                        @auth
                                            @foreach (($category->forums) as $forum)
                                            <tr>
                                                <td>
                                                    <h3 class="h5">
                                                        <a href="{{route('forum.overview', $forum->id)}}" class="text-uppercase">{{$forum->title}}</a>
                                                    </h3>
                                                    <p class="mb-0">
                                                        {!!$forum->desc!!}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div>{{$forum->discussions->count()}}
                                                </td>
                                            </tr>
                                            @endforeach

                                        @else
                                            @foreach (($category->forums) as $forum)
                                            <tr>
                                                <td>
                                                    <h3 class="h5">
                                                        <a href="/login" class="text-uppercase">{{$forum->title}}</a>
                                                    </h3>
                                                    <p class="mb-0">
                                                        {!!$forum->desc!!}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div>{{$forum->discussions->count()}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endauth
                                        
                                    @else
                                        <p>0 Forums found in this category</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @else
                    <h1>No Forum categories found</h1>
                @endif
            </div>

            {{-- forum & category request button --}}
            @auth
                @if (!(auth()->user()->is_admin))
                <div class="mt-4 mb-5">
                    <a class="btn btn-primary mb-2" href="/request/category">Request Category</a>
                    <br/>
                    <a class="btn btn-primary" href="/request/forum">Request Forum</a>
                </div>
                @endif
            @endauth

        </div>

        <div class="col-lg-4">
            <aside>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Members Online</h4>
                        <ul class="list-unstyled mb-0">
                            @if (count($users_online) > 0)
                                @foreach ($users_online as $user)
                                @if($user->id === auth()->id())
                                    <li>
                                        <a href="/home">
                                            {{$user->name}} <span class="badge badge-pill badge-success">online</span>
                                        </a>
                                    </li>
                                @else
                                <li>
                                    <a href="{{route('client.user.profile', $user->id)}}">
                                        {{$user->name}} <span class="badge badge-pill badge-success">online</span>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Members</h4>
                        <ul class="list-unstyled mb-0">
                            @if (count($few_users) > 0)
                                @foreach ($few_users as $key => $user)
                                    @if ($user->id === auth()->id())
                                    <li>
                                        <a href="/home">
                                            {{$user->name}}
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{route('client.user.profile', $user->id)}}">
                                            {{$user->name}}
                                        </a>
                                    </li>
                                    @endif    
                                @endforeach
                            @endif
                            <li>
                                <a href="{{route('client.users')}}" class="text-success">
                                    View All...
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Members Statistics</h4>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total Categories:</dt>
                            <dd class="col-4 mb-0">{{$totalCategories}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total Forums:</dt>
                            <dd class="col-4 mb-0">{{$forumsCount}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total Topics:</dt>
                            <dd class="col-4 mb-0">{{$topicsCount}}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-8 mb-0">Total members:</dt>
                            <dd class="col-4 mb-0">{{$totalMembers}}</dd>
                        </dl>
                    </div>
                    <div class="card-footer">
                        <div>Newest Member</div>
                        @if ($newest)
                            <div>
                                <a href="#">{{$newest->name}}</a>
                            </div>
                        @else
                        <div>
                            <p>No users yet!</p>
                        </div>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

@endsection
