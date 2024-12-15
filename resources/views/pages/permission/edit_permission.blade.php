@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Permission</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Permission</div>
            </div>
          </div>
          <div class="card">
          <div class="card-body">

          <form action="{{route('permission.update')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$permission->id}}">
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Permission Name:</label>
                                                    <input class="form-control" type="text" value="{{$permission->name}}" name="name" placeholder="Enter.." required>
                                                           
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label>Group Name:</label>
                                                    <select class="form-control" name="group_name"  required >
                                                            <option selected disabled value="" >Select Group Name</option>
                                                            <option value="Dashboard" {{$permission->group_name == 'Dashboard' ? 'selected' : ''}}>Dashboard</option>
                                                            <option value="Account" {{$permission->group_name == 'Account' ? 'selected' : ''}}>Account</option>
                                                            <option value="Report" {{$permission->group_name == 'Report' ? 'selected' : ''}}>Reports</option>
                                                            <option value="Settings" {{$permission->group_name == 'Settings' ? 'selected' : ''}}>Settings</option>
                                                            <option value="Role And Users" {{$permission->group_name == 'Role And Users' ? 'selected' : ''}}>Role And Users</option>
                                                        </select>
                                                </div>
                                             
                                            </div>
                                           
                                           <div class="text-center">
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit">Save changes</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                        </div>

          
        </section>
      </div>



      
@endsection