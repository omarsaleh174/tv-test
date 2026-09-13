<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BannerRequest;
use App\Repositories\Admin\BannerRepository;
use App\Http\Controllers\Controller;

use Yajra\DataTables\DataTables;

class BannersController extends Controller
{

    protected $repository;



    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        // if (request()->wantsJson()) {
        //     $item = $this->repository->get();
            
        //     return Datatables::of($item)
        //         ->addColumn('photo', function ($item) {
        //             return '<img src="' . $item->photo . '" alt="Photo" style="width: 50px; height: 50px;">';
        //         })
        //         ->addColumn('action', function ($item) {return action_form($item, 'banners', 'banners', $this->actions);})
        //         ->rawColumns(['photo', 'action'])->toJson();
        // }
        $jsonPath = public_path('settings_folder/photo.json');
        $photos = json_decode(file_get_contents($jsonPath), true);
        return view('admin.banners.index', compact('photos'));
    }
    
    public function banner_store(Request $request)
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


    public function store(BannerRequest $request)
    {
        $banner = $this->repository->create($request->all());
        if($request->hasFile('photo')) {
            $banner->photo=$this->fileUpload('banners',$request->photo);
            $banner->save();
        }

        return redirect()->back()->with('message', 'Banner created.');
    }

    public function show($id)
    {
        $banner = $this->repository->find($id);
        return view('admin.banners.show', compact('banner'));
    }


    public function edit($id)
    {
        $banner = $this->repository->find($id);
        return view('admin.banners.edit', compact('banner'));
    }


    public function update(BannerRequest $request, $id)
    {
        $banner = $this->repository->update($request->all(), $id);
        if($request->hasFile('photo')) {
            $banner->photo=$this->fileUpload('banners',$request->photo);
            $banner->save();
        }  

        return redirect()->back()->with('message', 'Banner updated.');
    }


    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Banner deleted.');
    }
}
