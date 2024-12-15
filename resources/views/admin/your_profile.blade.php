@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, {{$profile->name}}!</h2>
            <p class="section-lead">
              Change information about your self on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ (!empty($profile->photo)) ? url('upload/admin_image/'.$profile->photo) : url('upload/no_image.jpg') }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Username</div>
                        <div class="profile-widget-item-value">{{$profile->name}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-header">                     
                
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Phone</div>
                        <div class="profile-widget-item-value">{{$profile->phone}}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Email</div>
                        <div class="profile-widget-item-value">{{$profile->email}}</div>
                      </div>
                    </div>
                  </div>
              
                
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" action="{{route('profile.store')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Name:</label>
                            <input type="text" class="form-control" value="{{$profile->name}}" name="name" required="">
                            <div class="invalid-feedback">
                              Please fill in your name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" value="{{$profile->email}}" name="email" required="">
                            <div class="invalid-feedback">
                              Please fill in your email
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Phone:</label>
                            <input type="number" class="form-control" value="{{$profile->phone}}" name="phone" required="">
                            <div class="invalid-feedback">
                              Please fill in your phone
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control" value="">
                            
                          </div>
                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection