@extends('dashboard')
@section('admin')



     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Users</div>
            </div>
          </div>
          

          <div class="section-body">
            <div class="card">
                  <div class="text-right">
                    <a href="{{ route('add.user') }}" class="btn btn-primary"  ><i class="fa fa-plus-circle"></i> Add New</a>
                  </div>
                <div class="card-body">
                <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th style="text-align: right;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td> 
                                    <td><img src="{{ (!empty($item->photo)) ? url('upload/admin_image/'.$item->photo):url('upload/no_image.jpg') }}" style="width: 50px; height:50px;" >  </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td> 
                                        @foreach($item->roles as $role)
                                             <span class="badge badge-pill bg-danger"> {{ $role->name }} </span>
                                        @endforeach
                                    </td>
                                    <td style="text-align: right;">

                                    <a href="{{ route('reset.user.password',$item->id) }}" class="btn btn-info"  ><i class="fa fa-key"></i> Reset</a>
                                    <a href="{{ route('edit.user',$item->id) }}" class="btn btn-success"  ><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('delete.user',$item->id) }}" class="btn btn-danger" id="delete" ><i class="fa fa-trash"></i> Delete</a>

                                    </td>

                                      

                                   
                                @endforeach
                          
                        </tbody>
                      </table>
                    </div>

                </div>
            </div>
          </div>
        </section>
     </div>




@endsection