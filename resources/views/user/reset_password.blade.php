@extends('dashboard')
@section('admin')


<div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Reset Password</div>
            </div>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-body">

                <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ (!empty($user->photo)) ? url('upload/admin_image/'.$user->photo) : url('upload/no_image.jpg') }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Username</div>
                        <div class="profile-widget-item-value">{{$user->name}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-header">                     
                
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Phone</div>
                        <div class="profile-widget-item-value">{{$user->phone}}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Email</div>
                        <div class="profile-widget-item-value">{{$user->email}}</div>
                      </div>
                    </div>
                  </div>
              
                
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" action="{{route('reset.password')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="card-header">
                      <h4>Reset Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>New Password:</label>
                            <input type="text" class="form-control" placeholder="Enter New Password" name="password" required="">
                            <div class="invalid-feedback">
                              Please fill Password
                            </div>
                          </div>
                        
                        </div>
                        
                    </div>
                    <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-lock-open"></i> Reset Password </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>




             

                </div>
            </div>
          </div>
        </section>
     </div>
  

   
@endsection