<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use PhpParser\Node\Stmt\TryCatch;

class UserController  extends Controller
{
    //Create all CRUD Logic
    public function loadAllUsers()
    {
        $all_users= User::all();
        return view('users',compact('all_users'));
    }


    public function loadAddUserForm()
    {
        return view('add-user');
    }

    public function AddUser(Request $request){
        //perform form validation
        $request -> validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required | confirmed|min:4|max:8',

        ]);
        User::create([
            'name' => $request->full_name, // Assuming 'name' is the column in your users table
            'email' => $request->email,
            'phone_number' => $request->phone_number, // Ensure this column exists in the table
            'password' => bcrypt($request->password), // Hash the password
        ]);

 //Register user 
 try {
    // register user here
   $new_user = new User;
   $new_user->name = $request->full_name;
   $new_user->email = $request->email;
   $new_user->phone_number = $request->phone_number;
   $new_user->password = Hash::make($request->password);
   $new_user->save();

   return redirect('/users')->with('success','User Added Successfully');
} catch (\Exception $e) {
   return redirect('/add/user')->with('fail',$e->getMessage());
}
    }


public function EditUser(Request $request)
{
     // perform form validation here
     $request->validate([
        'full_name' => 'required|string',
        'email' => 'required|email',
        'phone_number' => 'required',
    ]);
    try {
         // update user here
        $update_user = User::where('id',$request->user_id)->update([
            'name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect('/users')->with('success','User Updated Successfully');
    } catch (\Exception $e) {
        return redirect('/edit/user')->with('fail',$e->getMessage());
    }
}



public function loadEditForm($id)
{
$user=User::find($id);
return view('edit-user',compact('user'));
}


    public function deleteUser($id)
    {
        try{
            User::where('id',$id)->delete();
            return redirect ('/users')->with('success','User Deleted successfully');

        }catch(\Exception $e)
        {
            return redirect ('/users')->with('fail',$e->getMessage());

        }
        {

        }
    }
}


        // dd("User created, redirecting to users.index");

        // return redirect()->route('users.index')->with('success', 'User added successfully!');    }


