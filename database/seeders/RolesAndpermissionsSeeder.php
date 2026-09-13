<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission ;
class RolesAndpermissionsSeeder extends Seeder{

    public function run()
    {
          


 
 
 
  
        $permissions = [
            'can change settings','view website section','view consultants section','view all reports',
            'view all users' ,  'add users' , 'update users' ,   'delete users' ,
            'view all consultants' ,  'add consultants' , 'update consultants' ,   'delete consultants' ,
            'view all banners' ,  'add banners' , 'update banners' ,   'delete banners' ,
            'view all types' ,  'add types' , 'update types' ,   'delete types' ,
            'view all logs' ,  'add logs' , 'update logs' ,   'delete logs' ,
            'view all categories' ,  'add categories' , 'update categories' ,   'delete categories' ,
            'view all tenders' ,  'add tenders' , 'update tenders' ,   'delete tenders' ,
            'view all clients' ,  'add clients' , 'update clients' ,   'delete clients' ,
            'view all cities' ,  'add cities' , 'update cities' ,   'delete cities' ,
            'view all countries' ,  'add countries' , 'update countries' ,   'delete countries' ,
            'view all subscriptions' ,  'add subscriptions' , 'update subscriptions' ,   'delete subscriptions' ,
            'view all consultations' ,  'add consultations' , 'update consultations' ,   'delete consultations' ,
            'view all departments' ,  'add departments' , 'update departments' ,   'delete departments' ,

            'view all roles' ,  'add roles' , 'update roles' ,   'delete roles','assign roles','view all client_tenders','view dashboard'
        ];

        //create all permissions
        foreach($permissions as $permission)
        {
            Permission::firstOrCreate(['name'=>$permission]);
        }

        Permission::whereNotIn('name',$permissions)->delete();

        $role = Role::firstOrCreate(['name' => 'admin']);
        Permission::firstOrCreate(['name'=>'admin']);
        $role->givePermissionTo('admin');
    }
}
