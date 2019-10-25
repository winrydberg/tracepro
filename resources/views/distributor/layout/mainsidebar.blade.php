<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li class=" navigation-header"><span>DISTRIBUTOR</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
        </li>
        <li class=" nav-item"><a href="{{url('/distributor/dashboard')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">DASHBOARD</span></a>
        </li>
        {{-- <li class=" nav-item"><a href="{{url('/distributor/receive-inputs')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">RECEIVE INPUTS</span></a>
        </li> --}}
        <li class=" nav-item"><a href="{{url('/distributor/new-order')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">NEW ORDER</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('/distributor/re-call')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">RE-CALL</span></a>
          
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">MY PRODUCTS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
          <ul class="menu-content">
          <li><a href="{{url('distributor/addproduct')}}" class="menu-item"> Add New</a></li>
            <li> <a href="{{url('distributor/productlist')}}" class="menu-item">Product List</a></li>
            </li>
          </ul>
        </li>
        {{-- <li class=" nav-item"><a href="{{url('/distributor/new-transaction')}}"><i class="ft-menu"></i><span data-i18n="" class="menu-title">NEW TRANSACTION</span></a>
        </li> --}}
      {{-- <li class=" nav-item"><a href="{{url('/admin/dashboard')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
        </li>
        <li class=" nav-item"><a href="#" onclick="openCustomRoxy2('')"><i class="ft-server"></i><span data-i18n="" class="menu-title">File Manager</span></a>
        </li>  --}}
          <li class=" nav-item"><a href="#"><i class="ft-users"></i><span data-i18n="" class="menu-title">TRANSACTION</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
          <ul class="menu-content">
            <li class=""><a href="{{url('/distributor/new-transaction')}}" class="menu-item">New Transaction</a>
            </li>
            <li><a href="{{url('/distributor/pending-transactions')}}" class="menu-item">Pending Transactions</a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="{{url('/regulator/logout')}}"><i class="ft-log-out"></i><span data-i18n="" class="menu-title">LOGOUT</span></a>
        </li>




      </ul>
    </div>
  </div>