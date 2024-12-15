@extends('dashboard')
@section('admin')


<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Roles</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Roles</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
              
                  <div class="text-right">
                    <button type="button" style="text-align: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                         <i class="fa fa-plus-circle"></i> Add New
                        </button>
                </div>
                  <div class="card-body">
                 
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Role Name</th>
                            <th style="text-align: right;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key=> $item)
                          <tr>
                            <td>{{ $key+1 }}</td> 
                            <td>{{$item->name}}</td>
                            <td style="text-align: right;">
                                <a href="{{ route('edit.roles',$item->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('delete.roles',$item->id) }}" class="btn btn-danger" id="delete" ><i class="fa fa-trash"></i> Delete</a>
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>





<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                <div class=" form-group">
                    <label>Role Name:</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter..." required>
                </div>
              
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
              

@endsection