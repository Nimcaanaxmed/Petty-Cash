<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
           
          </ul>
         
        </form>

@php

          $id = Auth::user()->id;
          $adminData = App\Models\User::find($id);

@endphp
        <ul class="navbar-nav navbar-right">
         
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle mr-1" width="500" heigh="500">
            <div class="d-sm-none d-lg-inline-block">{{$adminData->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{route('your.profile')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="{{route('change.password')}}" class="dropdown-item has-icon">
                <i class="fas fa-lock"></i> Change Password
              </a>
              @if(Auth::user()->can('settings.menu'))
              <a href="{{route('company.setting')}}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              @endif
              <div class="dropdown-divider"></div>
              <a href="{{route('admin.logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>