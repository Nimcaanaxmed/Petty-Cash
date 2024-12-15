@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Role</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Role</div>
            </div>
          </div>
          <div class="card">
          <div class="card-body">

          <form action="{{route('roles.update')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$role->id}}">
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label>Role Name:</label>
                                                    <input class="form-control" type="text" value="{{$role->name}}" name="name" placeholder="Enter.." required>
                                                           
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