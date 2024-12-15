<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionImport;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class RoleController extends Controller
{
    public function AllPermission(){

        $permissions = Permission::orderBy('id','DESC')->get();
        return view('pages.permission.all_permission',compact('permissions'));

    } // End Method 

    public function StorePermission(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:permissions|max:200',
            'group_name' => 'required|max:200',
           
            
        ],
        
        [
            'group_name.required' => 'Please enter group name',
        ]

    );


        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);

        $notification = array(
            'toastr' => 'Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);

    }// End Method 


    public function EditPermission($id){

        $permission = Permission::findOrFail($id);
        return view('pages.permission.edit_permission',compact('permission')); 
    
    } // End Method 


    public function UpdatePermission(Request $request){

        $permission = $request->id;
    
        $permission= Permission::find($permission);
        $permission->name = $request->name;
        $permission->group_name = $request->group_name;
        $permission->save();
    
        $notification = array(
            'toastr' => ' Permission Updated Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.permission')->with($notification);  
    
    }// End Method 


 


    public function DeletePermission($id){

        Permission::findOrFail($id)->delete();

        $notification = array(
            'toastr' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 

    public function AllRoles(){

        $roles = Role::all();
       return view('pages.roles.all_roles',compact('roles'));

   }// End Method 


   public function StoreRoles(Request $request){

    $validateData = $request->validate([
        
        'name' => 'required|unique:roles|max:200',
         
    ],
    [
        'name.required' => 'This Role Already Exist',
    ]
);
   $role = Role::create([
       'name' => $request->name, 

   ]);

   $notification = array(
       'toastr' => 'Role Added Successfully',
       'alert-type' => 'success'
   );

   return redirect()->route('all.roles')->with($notification);

}// End Method 


public function EditRoles($id){

    $role = Role::findOrFail($id);
    return view('pages.roles.edit_roles',compact('role')); 

} // End Method 


public function UpdateRoles(Request $request){

    $role = $request->id;

    $role= Role::find($role);
    $role->name = $request->name;
    $role->save();

    $notification = array(
        'toastr' => ' Role Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles')->with($notification);  

}// End Method 

public function UpdatesRoles(Request $request,$id){

    $role= Role::find($id);

    $role->update($request->all());
    $notification = array(
        'toastr' => 'Role Updated Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification); 
}


public function DeleteRoles($id){

    Role::findOrFail($id)->delete();

    $notification = array(
        'toastr' => 'Role Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method 

public function AddRolesPermission(){

    $roles = Role::all();
    $permissions = Permission::all();
    $permission_groups = User::getpermissionGroups();
    return view('pages.roles.add_roles_permission',compact('roles','permissions','permission_groups'));

}// End Method 


public function StoreRolesPermission(Request $request){

    $data = array();
    $permissions = $request->permission;

    foreach($permissions as $key => $item){
       $data['role_id'] = $request->role_id;
       $data['permission_id'] = $item;

       DB::table('role_has_permissions')->insert($data);

    }

    $notification = array(
        'toastr' => 'Role Permission Added Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles.permission')->with($notification);

}// End Method 

public function AllRolesPermission(){

    $roles = Role::all();
    return view('pages.roles.all_roles_permission',compact('roles'));

} // End Method 



public function AdminEditRoles($id){

    $role = Role::findOrFail($id);
    $permissions = Permission::all();
    $permission_groups = User::getpermissionGroups();
    return view('pages.roles.edit_roles_permission',compact('role','permissions','permission_groups')); 

} // End Method 


public function RolePermissionUpdate(Request $request,$id){

    $role = Role::findOrFail($id);
    $permissions = $request->permission;

    if (!empty($permissions)) {
        $role->syncPermissions($permissions);
    }

     $notification = array(
        'toastr' => 'Role Permission Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles.permission')->with($notification);

}// End Method 

public function AdminDeleteRoles($id){

    $role = Role::findOrFail($id);
    if (!is_null($role)) {
        $role->delete();
    }

    $notification = array(
        'toastr' => 'Role Permission Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}// End Method 


public function importPermissions(){

    return view('pages.permission.import');

}// End Method 


public function importRoles(Request $request){

    Excel::import(new PermissionImport, $request->file('import_file'));

     $notification = array(
        'toastr' => 'Permissions Imported Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 
}// End Method

}
