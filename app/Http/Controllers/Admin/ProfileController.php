<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class ProfileController extends Controller{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {           
      return view('admin.profile');
    }
 
    public function show($id='')
    {           
      return view('admin.profile');
    }
 

    public function update ($id,Request $request)
    {
        $user = User::where('id',$id)->update($request->only( 'name', 'email','phone'));
        $user = User::findOrFail($id);
        $request->password!=null?$user->password =$request->password:'';
        if($request->hasFile('photo')){
            $secvice=new MediaService();
            $user->photo=$secvice->delete_image($user->photo);
            $user->photo=$secvice->fileUpload('users',$request->photo);
        }
        $user->save();
         return redirect()->back()->with('message', 'User updated');
    }

}
 


