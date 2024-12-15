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
            <h1>Edit Roles in Permissions</h1>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-body">

                <form id="myForm" method="post" action="{{ route('role.permission.update',$role->id) }}" enctype="multipart/form-data">
                         @csrf
                    <div class="col-md-12">
                        <div class="ibox">
                       
                            <div class="ibox-head">
                                <div class="ibox-title">Role: {{ $role->name }}</div>
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
                    
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" value="" id="customckeck1" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''}}  >
                                    <label class="form-check-label" for="customckeck1">{{ $group->group_name }}</label>
                                </div>
                                </div>
                                    @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                    @endphp   
                        
                                    <div class="col-sm-8 form-group">
                                        @foreach($permissions as $permission)
                                            <div class="form-check form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="permission[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} value="{{ $permission->name }}" id="customckeck{{ $permission->id }}"  >
                                            <label class="form-check-label" for="customckeck{{ $permission->name }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>
                                @endforeach
                        <div class="text-center">
                        <button type="submit" class="btn btn-success "><i class="fa fa-save"></i> Save changes</button>
                        </div>

                    </div>
                  
                    </form>

                </div>
            </div>
          </div>
        </section>
      </div>
     
      
</script>
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