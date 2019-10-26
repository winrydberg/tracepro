<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li class=" navigation-header"><span>Menu</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
        </li>
      <li class=" nav-item"><a href="{{url('/farmers/home')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">HOME</span></a>
        </li>

        <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">RECEIVE INPUTS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class=""><a href="{{url('/farmers/addinput')}}" class="menu-item">Add New</a> </li>
              <li><a href="{{url('/farmers/inputlist')}}" class="menu-item">List</a></li>
              </li>
            </ul>
          </li>

          {{-- <li class=" nav-item"><a href="{{url('/farmers/home')}}"><i class="ft-list"></i><span data-i18n="" class="menu-title">MY PRODUCTS</span></a>
          </li> --}}

          <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">MY PRODUCTS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class=""><a href="{{url('/farmers/addproduct')}}" class="menu-item">Add New</a> </li>
              <li><a href="{{url('/farmers/productlist')}}" class="menu-item">List Product</a></li>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="{{url('/farmers/approvals')}}"><i class="ft-list"></i><span data-i18n="" class="menu-title">APPROVALS</span></a>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">CUSTOMERS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
            <li class=""><a href="{{url('/farmers/createcustomer')}}" class="menu-item">Add New</a> </li>
            <li><a href="{{url('/farmers/customerlist')}}" class="menu-item">List</a></li>
              </li>
            </ul>
          </li>

        <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">ACTIVITIES RECORDS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class=""><a href="{{url('/farmers/farmrecords')}}" class="menu-item">Add New</a> </li>
              <li><a href="{{url('/farmers/farmrecordslist')}}" class="menu-item">List</a></li>
              </li>
            </ul>
          </li>
        
        <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">FARM/PLOTS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
            <li><a href="{{url('/farmers/farms')}}" class="menu-item">Farms</a></li>
              <li> <a href="{{url('/farmers/plots')}}" class="menu-item">Plots</a></li>
              </li>
            </ul>
          </li>

        <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">TRANSACTIONS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
            <li class=""><a href="{{url('/farmers/transactions')}}" class="menu-item">Add New</a> </li>
              <li><a href="#" class="menu-item">List</a></li>
              </li>
            </ul>
          </li>

    <li class=" nav-item"><a href="{{url('/actors/logout')}}"><i class="ft-list"></i><span data-i18n="" class="menu-title">LOGOUT</span></a>
        </li>

      </ul>
    </div>
  </div>