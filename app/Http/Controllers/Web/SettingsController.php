<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingTimeRequest;
class SettingsController extends Controller
{

    public function index()
{
    $jsonPath = public_path('settings_folder/settings.json');
    $settings = json_decode(file_get_contents($jsonPath), true);
    return view('admin.settings.index', compact('settings'));
}


public function store(SettingRequest $request)
{
    $jsonPath = public_path('settings_folder/settings.json');
    $settings = json_decode(file_get_contents($jsonPath), true);
    $settings['name'] = $request->name;
    $settings['phone'] = $request->phone;
    $settings['email'] = $request->email;
    $settings['latitude'] = $request->latitude;
    $settings['longitude'] = $request->longitude;
    $settings['is_free'] = $request->is_free??0;
    if($request->hasFile('logo')) {
        $this->delete_image( public_path('settings\\'.$settings['logo']  ));
        $settings['logo']=$this->fileUpload('settings',$request->logo);
    }

    file_put_contents($jsonPath, json_encode($settings, JSON_PRETTY_PRINT));
    return redirect()->back()->with('message', 'Settings updated successfully!');
}
public function storeDate(SettingTimeRequest $request)
{
    $jsonPath = public_path('settings_folder/send_data_time.json');
    $settings = json_decode(file_get_contents($jsonPath), true);
    $settings['time_send_tender'] = $request->time_send_tender;
    if($settings['day_send_tender']!=$request->day_send_tender)
    {
        $settings['first_date'] = now()->format('d-m-Y');
    }
    else
    {
        $settings['first_date'] = $settings['first_date'];
    }
    $settings['day_send_tender'] = $request->day_send_tender;
    file_put_contents($jsonPath, json_encode($settings, JSON_PRETTY_PRINT));
    return redirect()->back()->with('message', 'Settings updated successfully!');
}


}
