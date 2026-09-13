<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests\PhotoRequest;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{

    public function index()
    {
        $jsonPath = public_path('settings_folder/photo.json');
        $photos = json_decode(file_get_contents($jsonPath), true);
        return view('admin.settings.photos', compact('photos'));
    }


public function store(PhotoRequest $request)
{
    $jsonPath = public_path('settings_folder/photo.json');
    $photos = json_decode(file_get_contents($jsonPath), true);
    foreach ($photos as $key => $value )
    {
       if($request->hasFile($key)) {
            $photos[$key]=$this->fileUploadWithName('web',$request->$key,$key);
        }
    }
    file_put_contents($jsonPath, json_encode($photos, JSON_PRETTY_PRINT));
    return redirect()->back()->with('message', 'Photos updated successfully!');
}
public function banner_store(PhotoRequest $request)
{
    $jsonPath = public_path('settings_folder/photo.json');
    $photos = json_decode(file_get_contents($jsonPath), true);
    $photos['banner_link_1']=$request->banner_link_1;
    $photos['banner_link_2']=$request->banner_link_2;
    $photos['banner_link_3']=$request->banner_link_3;
    $photos['banner_link_4']=$request->banner_link_4;
    $photos['banner_link_5']=$request->banner_link_5;
    $photos['banner_link_6']=$request->banner_link_6;
    foreach ($photos as $key => $value )
    {
       if($request->hasFile($key)) {
            $photos[$key]=$this->fileUploadWithName('web',$request->$key,$key);
        }
    }
    file_put_contents($jsonPath, json_encode($photos, JSON_PRETTY_PRINT));
    return redirect()->back()->with('message', 'Photos updated successfully!');
}

}
