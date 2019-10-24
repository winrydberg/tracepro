<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper" >
      <div class="navbar-header" style="background: #16000D">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto"><a class="navbar-brand">
              <h2 class="brand-text">TRACEPRO</h2></a></li>
          <li class="nav-item d-md-none"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div id="navbar-mobile" class="collapse navbar-collapse">
          <ul class="nav navbar-nav mr-auto float-left">
            
          </ul>
          <ul class="nav navbar-nav float-right">

           
            <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{asset('assets/images/profile.png')}}" alt="avatar"><i></i></span><span class="user-name">Welcome</span></a>
              <div class="dropdown-menu dropdown-menu-right"><a href="{{url('/web/itsebackend/logout')}}" class="dropdown-item"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>