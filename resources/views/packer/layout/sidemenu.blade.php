<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <div class="main-menu-content">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li class=" navigation-header"><span>Menu</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
        </li>
      <li class=" nav-item"><a href="{{url('/packer/home')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">HOME</span></a>
        </li>

        <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">RECEIVE PRODUCT</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class=""><a href="{{url('/packer/receiveproduct')}}" class="menu-item">Receive</a> </li>
              <li><a href="#" class="menu-item">History</a></li>
              </li>
            </ul>
          </li>


          <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">MY SUPPLIERS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class=""><a href="#" class="menu-item">Create</a> </li>
              <li><a href="#" class="menu-item">List</a></li>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">MY CUSTOMERS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class=""><a href="#" class="menu-item">Create</a> </li>
              <li><a href="#" class="menu-item">List</a></li>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">PRODUCTS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
            <li class=""><a href="{{url('/packer/addproduct')}}" class="menu-item">Create</a> </li>
              <li><a href="{{url('/packer/productlist')}}" class="menu-item">List</a></li>
              </li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">RECALL</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <li class=""><a href="#" class="menu-item">Submit a recall</a> </li>
              <li><a href="#" class="menu-item">history</a></li>
              </li>
            </ul>
          </li>
        
          <li class=" nav-item"><a href="#"><i class="ft-list"></i><span data-i18n="" class="menu-title">TRANSACTIONS</span><span class="badge badge badge-primary badge-pill float-right mr-2"></span></a>
            <ul class="menu-content">
              <?php $bin = Session::get('outh')->bin; ?>
              <li class=""><a href="{{url('/packer/transactions')}}" class="menu-item">Add New</a> </li>
            <li><a href="{{url('/packer/pending-transactions/'.$bin)}}" class="menu-item">Pending Transactions</a></li>
              </li>
            </ul>
          </li>

         <li class=" nav-item"><a href="{{url('/actors/logout')}}"><i class="ft-list"></i><span data-i18n="" class="menu-title">LOGOUT</span></a>
        </li>

      </ul>
    </div>
  </div>