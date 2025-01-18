@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();

 @endphp      

          <ul class="sidebar-menu">
          @if(Auth::user()->can('dashboard.menu'))   
            <li class="{{ ($route == 'dashboard')?'active':'' }}"><a class="nav-link"  href="{{route('dashboard')}}"><i class="fas fa-home"></i> <span>DASHBOARD</span></a></li>
          @endif

          
            @if(Auth::user()->can('account.menu'))
            <li class="dropdown {{ ($route == 'income.list')?'active':'' }} {{ ($route == 'expense.detail')?'active':'' }} {{ ($route == 'details.salary')?'active':'' }} {{ ($route == 'salary.submittion')?'active':'' }} {{ ($route == 'salary.list')?'active':'' }} {{ ($route == 'statement.view')?'active':'' }} {{ ($route == 'expense.list')?'active':'' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-solid fa-file-invoice-dollar"></i> <span>ACCOUNT</span></a>
              <ul class="dropdown-menu">

                <li class="{{ ($route == 'income.list')?'active':'' }}"><a class="nav-link" href="{{route('income.list')}}"> Credit</a></li>

                <li class="{{ ($route == 'expense.list')?'active':'' }}"><a class="nav-link" href="{{route('expense.list')}}">Debit</a></li>

                <li class="{{ ($route == 'statement.view')?'active':'' }}"><a class="nav-link" href="{{route('statement.view')}}">Statements</a></li>
             
              </ul>
            </li>
            @endif
           
            @if(Auth::user()->can('role.and.users.menu'))
            <li class="menu-header">ROLE AND USERS</li>
            <li class="{{ ($route == 'import.permissions')?'active':'' }} {{ ($route == 'all.users')?'active':'' }} "><a class="nav-link " href="{{route('all.users')}}"><i class="fas fa-key"></i> <span>USERS</span></a></li>
            
            <li class="dropdown {{ ($route == 'all.roles.permission')?'active':'' }} {{ ($route == 'add.roles.permission')?'active':'' }} {{ ($route == 'all.permission')?'active':'' }} {{ ($route == 'all.roles')?'active':'' }}">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-lock"></i> <span>ROLE</span></a>
              <ul class="dropdown-menu">
                <li class="{{ ($route == 'all.permission')?'active':'' }}"><a class="nav-link" href="{{route('all.permission')}}">Permissions</a></li>
                <li class="{{ ($route == 'all.roles')?'active':'' }}"><a class="nav-link" href="{{route('all.roles')}}">Roles</a></li>
                <li class="{{ ($route == 'add.roles.permission')?'active':'' }}"><a class="nav-link" href="{{route('add.roles.permission')}}">Assign Roles</a></li>
                <li class="{{ ($route == 'all.roles.permission')?'active':'' }}"><a class="nav-link" href="{{route('all.roles.permission')}}">All Roles Permission</a></li>
                <!-- <li class="{{ ($route == 'import.permissions')?'active':'' }}"><a class="nav-link" href="{{route('import.permissions')}}">Import Permissions</a></li> -->
              </ul>
            </li>
            @endif
          </ul>