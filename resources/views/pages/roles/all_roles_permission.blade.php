@extends('dashboard')
@section('admin')



<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>All Roles in Permission</h1>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-body">
              <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th style="text-align: right;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td> 
                            <td>{{ $item->name }}</td>
                            <td> 
                            @foreach($item->permissions as $perm)
                <span class="badge rounded-pill bg-success"> {{ $perm->name }} </span>
                            @endforeach

                            </td> 
                            <td width="18%">
                        <a href="{{ route('admin.edit.roles',$item->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <a href="{{ route('admin.delete.roles',$item->id) }}" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> Delete</a>

                            </td>
                        </tr>
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