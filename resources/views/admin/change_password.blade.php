@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Change Password</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Change Password</div>
            </div>
          </div>
          <div class="card">
          <div class="card-body">

          <form action="{{route('update.password')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Current Password:</label>
                                                    <input class="form-control" type="text"  name="old_password" placeholder="Enter.." required>
                                                            @error('old_password')
                                                                    <span class="text-danger"> {{ $message }} </span>
                                                            @enderror
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>New password:</label>
                                                    <input class="form-control" name="new_password"  type="password" placeholder="Enter.." required>
                                                        @error('new_password')
                                                          <span class="text-danger"> {{ $message }} </span>
                                                        @enderror
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Confirm New Passwod:</label>
                                                    <input class="form-control" name="new_password_confirmation"  type="password" placeholder="Enter.." required>
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