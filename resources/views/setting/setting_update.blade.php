@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Settings</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Settings</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Company Settings</h2>
            <p class="section-lead">
              Change settings on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{asset($setting->logo)}}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Company Name:</div>
                        <div class="profile-widget-item-value">{{$setting->name}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-header">                     
                
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Contact:</div>
                        <div class="profile-widget-item-value">{{$setting->contact}}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Email</div>
                        <div class="profile-widget-item-value">{{$setting->email}}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Address:</div>
                        <div class="profile-widget-item-value">{{$setting->address}}</div>
                      </div>
                    </div>
                  </div>
                   
                  </div>
              
                
                </div>
              </div>
             
            </div>
            <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form method="post" action="{{route('company.setting.update')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$setting->id}}">
                    <div class="card-header">
                      <h4>Edit Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Company Name:</label>
                            <input type="text" class="form-control" value="{{$setting->name}}" name="name" required="">
                            <div class="invalid-feedback">
                              Please enter company name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" value="{{$setting->email}}" name="email" required="">
                            <div class="invalid-feedback">
                              Please fill in your email
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Contact:</label>
                            <input type="text" class="form-control" value="{{$setting->contact}}" name="contact" required="">
                            <div class="invalid-feedback">
                              Please fill in your phone
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Currency:</label>
                          <select name="currency" id="" class="form-control" required>
                            <option disabled selected value="">Select Currency</option>
                            
                            <option value="SL" {{$setting->currency == 'SL' ? 'selected' : ''}}>SLSH</option>
                            <option value="$" {{$setting->currency == '$' ? 'selected' : ''}}>$</option>

                          </select>
                            <div class="invalid-feedback">
                              Please choose company currency
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Address:</label>
                            <input type="text" class="form-control" value="{{$setting->address}}" name="address" required="">
                            <div class="invalid-feedback">
                              Please enter company address
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Logo:</label>
                            <input type="file" name="logo" class="form-control" value="">
                            
                          </div>
                        </div>
                        
                    </div>
                    <div class="card-footer text-center">
                    <button class="btn btn-outline-success">Save Changes</button>
                      
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection