<?php
namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
   {

    private $hidden_permissions;
    private $hidden_roles;
    function __construct()
    {
        $this->hidden_permissions=['admin','instructor only view' ,'instructor can edit' ];
        $this->hidden_roles=['instructor only view' ,'instructor can edit' ];
        //  $this->middleware('permission:admin|view all role', ['only' => ['index','show']]);
        //  $this->middleware('permission:admin|add role', ['only' => ['create','store']]);
        // //  $this->middleware('permission:admin|update role', ['only' => ['edit','update']]);
        //  $this->middleware('permission:admin|delete role', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $roles = Role::whereNotIn('name',['instructor only view' ,'instructor can edit' ])->get();
        // return  $roles;
        return view('web.roles.index',compact('roles'));
    }

    public function create()
    {

        $permissions = Permission::all();
        return view('web.roles.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.index')->with('message','تم الاضافة بنجاح');
    }


    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('web.roles.show',compact('role','rolePermissions'));
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::whereNotIn('name',$this->hidden_permissions)->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('web.roles.edit',compact('role','permissions','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required','permissions' => 'required',]);
        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permissions'));
        return redirect()->route('roles.index')->with('message','تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        \DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')->with('message','تم الحذف بنجاح');
    }

    public function assign_role($id) {
        $user = User::findorFail($id);
        $roles = Role::whereNotIn('name', ['instructor only view' ,'instructor can edit' ])->get();
        return view('web.users.assign_role',compact('user','roles'));
    }

    public function post_assign_role ($id,Request $request) {
        $user = User::findorFail($id);
        $role = Role::findOrFail($request->role_id);
        $user->syncRoles([$request->role_id]);
        $user->save();
        return redirect()->back()->with('message', 'تم الاضافة بنجاح');
    }

}
