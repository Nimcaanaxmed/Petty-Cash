@extends('dashboard')
@section('admin')



 <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Add User</div>
            </div>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-body">

                <form action="{{route('user.store')}}" method="POST">
                            @csrf
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Username:</label>
                                    <input type="text"  name="name" class="form-control" placeholder="Enter.." required>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="number"  name="phone" class="form-control" placeholder="Enter.." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email"  name="email" class="form-control" placeholder="Enter.." required>
                                </div>
                               
                                <div class="form-group">
                                    <label class="form-control-label">Role: </label>
                                    <select class="form-control select2_demo_1" name="roles" required>
                                                <option selected disabled value="">Select Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Password:</label>
                                    <input type="password"  name="password" class="form-control" placeholder="Enter.." required>
                                </div>
                               
                             
                            </div>
                    </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-circle"></i> Save User </button>
                                </div>
                </form>

                </div>
            </div>
          </div>
        </section>
    </div> 
   
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Users</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=""><i class="la la-home font-20"></i></a>
                    </li>
                   
                </ol>
            </div>
            <div class="page-content fade-in-up">
            <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add User</div>

                       
                    </div>
                    <div class="ibox-body">
                <form action="{{route('user.store')}}" method="POST">
                            @csrf
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Username:</label>
                                    <input type="text"  name="name" class="form-control" placeholder="Enter.." required>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="number"  name="phone" class="form-control" placeholder="Enter.." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email"  name="email" class="form-control" placeholder="Enter.." required>
                                </div>
                               
                                <div class="form-group">
                                    <label class="form-control-label">Role: </label>
                                    <select class="form-control select2_demo_1" name="roles" required>
                                                <option selected disabled value="">Select Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Password:</label>
                                    <input type="password"  name="password" class="form-control" placeholder="Enter.." required>
                                </div>
                               
                             
                            </div>
                    </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-circle"></i> Save  </button>
                                </div>
                </form>
                    </div>
                </div>

                
            </div>
            <!-- END PAGE CONTENT-->
           
        </div>

      


   
@endsection