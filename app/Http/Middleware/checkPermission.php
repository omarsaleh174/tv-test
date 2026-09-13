<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class checkPermission
{
    
    public function handle(Request $request, Closure $next)
    {
        $data =   \Route::currentRouteName();
        $data = explode( '.',$data,2);
        

        if(isset($data[1]))
        {
            if($data[1]=='create')
                if(!auth()->user()->canany(["admin","add_$data[0]"]))
                    abort(401);
            if($data[1]=='index')
                if(!auth()->user()->canany(["admin","show_$data[0]"]))
                    abort(401);
            if($data[1]=='edit')
                if(!auth()->user()->canany(["admin","edit_$data[0]"]))
                    abort(401);
            if($data[1]=='show')
                if(!auth()->user()->canany(["admin","show_$data[0]"]))
                    abort(401);
            if($data[1]=='destroy')
                if(!auth()->user()->canany(["admin","delete_$data[0]"]))
                    abort(401);
        }
        return $next($request);
    }
}
