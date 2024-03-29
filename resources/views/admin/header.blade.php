<?php
$notifications = DB::table('notifications')->where('is_read', 0)->get();

?>
<header class="header twitter-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="/dashboard/home" class="logo" style="color:  #fff;">Del Solved</span></a>
    <!--logo end-->
    <div class="top-nav notification-row">
      <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">

        <!-- alert notification start-->
        <li id="alert_notificatoin_bar">
          <a  href="{{route('notifications')}}">

                          <i class="icon-bell-l"></i>
                          <span class="badge bg-important">{{count($notifications)}}</span>
                      </a>

        </li>
        <!-- alert notification end-->
        <!-- user login dropdown start-->
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="profile-ava">
                              <img alt="" src="img/avatar1_small.jpg">
                          </span>
                        @if (auth()->user())
                        <span class="username">{{auth()->user()->name}}</span>
                        @endif
                          <b class="caret"></b>
                      </a>
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <li class="eborder-top">
              <a href="{{route('admin.profile')}}"><i class="icon_profile"></i> My Profile</a>
            </li>

          </ul>
        </li>
        <!-- user login dropdown end -->
      </ul>
      <!-- notificatoin dropdown end-->
    </div>
  </header>
