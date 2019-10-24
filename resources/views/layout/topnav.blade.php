<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header" style="background: #16000D">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto"><a href="#" class="navbar-brand">
                  @if(Session::has('type') and Session::get('type')=='superadmin')
                <h2 class="brand-text">SeekApo</h2>
                @else
                  <?php  Session::forget('smsname');?>
                  @if(Session::has('smsname'))
                <h2 class="brand-text">{{Session::get('smsname')}}</h2>
                @else
                  <?php Session::put('smsname',DB::table('schools')->where('id',Session::get('school_id'))->first(['smsname','name'])->name); ?>
                  <h2 class="brand-text">{{Session::get('smsname')}}</h2>
                 @endif
                @endif

              </a></li>
          {{--   <li class="nav-item d-none d-md-block float-right"><a data-toggle="collapse" class="nav-link modern-nav-toggle pr-0"><i data-ticon="ft-toggle-right" class="toggle-icon ft-toggle-right font-medium-3 white"></i></a></li> --}}
            <li class="nav-item d-md-none"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div id="navbar-mobile" class="collapse navbar-collapse">
            <ul class="nav navbar-nav mr-auto float-left">           
              <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-link-expand"><i class="ficon ft-maximize"></i></a></li>          
            </ul>
            <ul class="nav navbar-nav float-right">
              @if(Session::has('type') and Session::get('type')=='mainadmin')
              <?php   
              
              $c = DB::table('complaints')->where('school_id',Session::get('school_id'))->where('read',0)->orderBy('created_at','DESC')->get(); 

              ?>
              <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up">{{count($c)}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag badge badge-default badge-danger float-right m-0"></span></h6>
                  </li>
                  <li class="scrollable-container media-list">
                    @if(count($c) > 0)
                    <a href="{{url('/admin/complaints')}}">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-user icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">From a {{$c[0]->from}}</h6>
                          <p class="notification-text font-small-3 text-muted">{{substr($c[0]->description,0,50)}}</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted"></time></small>
                        </div>
                      </div></a>
                      @endif
                    </li>
                  <li class="dropdown-menu-footer"><a href="{{url('/admin/complaints')}}" class="dropdown-item text-muted text-center">Read more</a></li>
                </ul>
              </li>
              @endif
             
              @switch(Session::get('type'))
                @case('superadmin')
                   <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{asset('assets/images/profile.png')}}" alt="avatar"><i></i></span><span class="user-name">{{Session::get('user')->username}}</span></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-divide"></div><a href="{{url('/superadmin/login')}}" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                              </div>
                            </li>
                @break
                    @case('mainadmin')
                   <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{asset('assets/images/profile.png')}}" alt="avatar"><i></i></span><span class="user-name">{{Session::get('user')->username}}</span></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-divide"></div><a href="{{url('/schools/logout')}}" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                              </div>
                            </li>
                @break

              @endswitch
             
            </ul>
          </div>
        </div>
      </div>
    </nav>