@if(Session::get('type')=='mainadmin')
@if(Session::get('user')->level=='Accountant')
@include('layout.sidemenuaccountant')
@endif
@if(in_array(Session::get('user')->level,['Director','Deputy Director','Administrator','mainadmin']))
@include('layout.sidemenubasic')
@endif
@if(Session::get('user')->level=='Secretary')
@include('layout.sidemenusecretary')
@endif
@endif