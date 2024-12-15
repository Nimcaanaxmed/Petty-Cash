@extends('dashboard')
@section('admin')


<div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Edit User</div>
            </div>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-body">

                <form action="{{route('user.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Username:</label>
                                    <input type="text"  name="name" value="{{$user->name}}" class="form-control" placeholder="Enter.." required>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="number"  name="phone" value="{{$user->phone}}" class="form-control" placeholder="Enter.." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email"  name="email" value="{{$user->email}}" class="form-control" placeholder="Enter.." required>
                                </div>
                               
                                <div class="form-group">
                                    <label class="form-control-label">Role: </label>
                                    <select class="form-control select2_demo_1" name="roles" required>
                                                <option selected disabled value="">Select Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>
                           
                    </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check-circle"></i> Save changes </button>
                                </div>
                </form>

                </div>
            </div>
          </div>
        </section>
     </div>
  

   
@endsection