<nav class="navbar navbar-default header navbar-fixed-top">
  <div class="col-md-12 nav-wrapper">
    <div class="navbar-header" style="width:100%;">
      <div class="opener-left-menu is-open">
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
      </div>
        <a href="{{ route('home') }}" class="navbar-brand"> 
         <b>{{ config('app.name') }}</b>
        </a>

      <ul class="nav navbar-nav search-nav">
        <li>
           <div class="search">
            <span class="fa fa-search icon-search" style="font-size:23px;"></span>
            <div class="form-group form-animate-text">
              <input type="text" class="form-text" required>
              <span class="bar"></span>
              <label class="label-search">Type anywhere to <b>Search</b> </label>
            </div>
          </div>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right user-nav">
        <li class="user-name"></li>
          <li class="dropdown avatar-dropdown">
           <img src="{{ asset('files/profile/images/'.Auth::user()->profile_image) }}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
           <span class="user-name" data-toggle="dropdown" style="font-size: 25px; vertical-align: bottom;"> {{ Auth::user()->name }}</span>
           <ul class="dropdown-menu user-dropdown">
             <li><a href="{{ route('profile') }}"><span class="fa fa-user text-primary" style="font-size: 20px;"></span> My Profile</a></li>
             <li><a href="{{ route('messages.index','inbox') }}"><span class="fa fa-envelope text-success" style="font-size: 20px;"></span> Messaging </a></li>
             <li role="separator" class="divider"></li>
             <li class="more" style="min-width: 200px; height: 50px;">
              <ul>
                <div class="row">
                  <div class="col-md-6">
                    <li><a href="{{ route('settings') }}"><span class="fa fa-cogs prof-icons" style="font-size: 25px;"></span></a></li>
                  </div>
                  <div class="col-md-6">
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-power-off prof-icons" style="font-size: 25px;" ></span></a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                    </li>
                  </div>
                </div>
                
              </ul>
            </li>
          </ul>
        </li>
        @permission('can_view_right_bar')
          <li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>
        @endpermission
      </ul>
    </div>
  </div>
</nav>