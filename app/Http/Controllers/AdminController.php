<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminController extends Controller
{
    public function AdminDestroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         $notification = array(
            'toastr' => ' See you again Inshallah.',
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    } // End Method 

    public function YourProfile(){

        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('admin.your_profile',compact('profile'));


    }// End Method

   


        public function ProfileStore(Request $request) {
            $id = Auth::user()->id;
            $data = User::find($id);

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
        
            if ($request->file('photo')) {
                $file = $request->file('photo');
                @unlink(public_path('upload/admin_image/'.$data->photo));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_image'), $filename);
                $data->photo = $filename; // Change assignment to $data->photo
            }
            
            $data->save();
        
            // Trigger iziToast notification
            $notification = [
                'toastr' => 'Your profile updated successfully',
                'alert-type' => 'success'
            ];
        
            return redirect()->back()->with($notification);
        }



    public function EditProfileStore($id){
        $id = Auth::user()->id;
        $profile = User::find($id);
        return view('admin.edit_profile',compact('profile'));

    }// End Method



    public function ChangePassword(){
        return view('admin.change_password');
    }// End Method 



    public function UpdatePassword(Request $request){

        /// Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

        ]);

        /// Match The Old Password 
        if (!Hash::check($request->old_password, auth::user()->password)) {

             $notification = array(
            'toastr' => 'Old Password Does not Match!!',
            'alert-type' => 'error'
             ); 
            return back()->with($notification);
           
        }

        //// Update The New Password 

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

            $notification = array(
            'toastr' => 'Password Changed Successfully',
            'alert-type' => 'success'
             ); 
            return back()->with($notification);

    }// End Method 






    public function AllUsers(){

        $users = User::latest()->get();
        return view('user.all_users',compact('users'));
    }// End Method 

    public function AddUser(){
        $roles = Role::all();
        return view('user.add_user',compact('roles'));
    }// End Method 


    public function StoreUser(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
    
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
    
        $notification = array(
            'toastr' => ' User Saved Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.users')->with($notification);  
    
    }// End Method 

    public function Edituser($id){
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('user.edit_user',compact('roles','user'));
    
    }// End Method 

    
public function UpdateUser(Request $request){

    $admin_id = $request->id;

    $user = User::findOrFail($admin_id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone; 
    $user->save();

    $user->roles()->detach();
    if ($request->roles) {
        $user->assignRole($request->roles);
    }

    $notification = array(
        'toastr' => ' User Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.users')->with($notification);  

}// End Method 



public function DeleteUser($id){

    $user = User::findOrFail($id);
    if (!is_null($user)) {
        $user->delete();
    }

    $notification = array(
        'toastr' => ' User Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 

}// End Method 

public function ResetUserPassword($id){
    $user = User::findOrFail($id);
    return view('user.reset_password',compact('user'));

}// End Method 


public function ResetUsesrPassword(Request $request, $id)
{
    // Find the user by ID
    $user = User::find($id);

    $hashedPassword = Hash::make($request->input('password'));

    $user->password = $hashedPassword;
    $user->save();

    $notification = [
        'toastr' => 'Password updated successfully',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}

public function ResetPassword(Request $request){

    $password = $request->id;

    $user = User::findOrFail($password);
    $hashedPassword = Hash::make($request->input('password'));

    $user->password = $hashedPassword;
    $user->save();
   
    $notification = array(
        'toastr' => 'Password Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.users')->with($notification);  

}// End Method




}
