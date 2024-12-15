@extends('dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style type="text/css">
    
    .form-check-label{
        text-transform: capitalize;
    }
</style>


<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Blank Page</h1>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-body">
                <form id="myForm" method="post" action="{{ route('role.permission.store') }}" enctype="multipart/form-data">
                         @csrf
                    <div class="col-md-12">
                        <div class="ibox">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                           
                                <label>Role:</label>
                                <select class="form-control" name="role_id"  required >
                                    <option selected disabled value="" >Select Role</option>
                                    @foreach($roles as $role)  
                                    <option value="{{ $role->id }}"> {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                         
                        </div>
                            <div class="ibox-head">
                                <div class="ibox-title">Permissions</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="ibox-body">
                        <div class="row">
                                <div class="col-sm-4 form-group">
                    
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" type="checkbox" value="" id="customckeck15"  >
                                    <label class="form-check-label" for="customckeck15">Select All</label>
                                </div>
                                </div>
                                
                            

                    
                        </div>
                        @foreach($permission_groups as $group)
                            <div class="row">
                                <div class="col-sm-4 form-group">
                    
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" type="checkbox" value="" id="customckeck1"  >
                                    <label class="form-check-label" for="customckeck1">{{ $group->group_name }}</label>
                                </div>
                                </div>
                                    @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                    @endphp   
                        
                                    <div class="col-sm-8 form-group">
                                        @foreach($permissions as $permission)
                                            <div class="form-check form-check-primary">
                                                <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="customckeck{{ $permission->id }}"  >
                                                <label class="form-check-label" for="customckeck{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>
                                @endforeach
                        <div class="text-center">
                        <button type="submit" class="btn btn-success "><i class="fa fa-save"></i> Save</button>
                        </div>

                    </div>
                  
                    </form>
                </div>
            </div>
          </div>
        </section>
      </div>


<script type="text/javascript">
        $('#customckeck15').click(function(){
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked',true);
            }else{
                $('input[type = checkbox]').prop('checked',false);
            } 

        });
   </script>
@endsection