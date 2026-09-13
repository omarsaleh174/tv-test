<?php


function input($data) 
{
return '<div class="form-group row '.$data["class"].'"><label class="col-sm-2 col-form-label"> '.$data["label"].' </label> <div class="col-sm-8"><input class="form-control ' .$data["class_input"].'" name="'.$data["name"].'" type="'.$data["type"].'" value="'.$data["value"].'"></div></div>' ;
}

// function input($data) {return '<div class="form-group '.$data["class"].'"><label> '.$data["label"].' </label><input class="form-control ' .$data["class_input"].'" name="'.$data["name"].'" type="'.$data["type"].'" value="'.$data["value"].'"></div>' ;}

function textarea($data) 
{
 return '
 <div class="form-group row '.$data['class'].'"><label class="col-sm-2 col-form-label" > '.$data['label'].' </label><div class="col-sm-8"><textarea class="form-control '.$data['class_input'].'" rows="6" name="'.$data['name'].'">'.$data['value'].'</textarea></div></div>
 ';
}
function action_form($item,$route,$permission,$actions=['show','edit','delete'])
{
 return view('action_form',compact('item','route','permission','actions')) ;
}



function select($data) 
{
    $out =  '<div class="form-group   ';
    $out .= $data['class']??'';
    $out .= '"><label class="col-sm-12 col-form-label">';
    $out .= trans("cruds.".$data['label']);

    $out.='</label> <div class="col-sm-12"><select id="'.$data['name'].'" name="';
    $out.=$data['name']??'';
    $out.='" class="form-control form-select select2">';
    $out.='<option value=""> '.trans('cruds.select').' '.trans("cruds.".$data['label']).'</option>';
    foreach($data['items'] as $item)
    {
        if($item['id']==$data['value'])
          $out.='<option value="'.$item['id'].'"selected>'.$item[$data['view_data']].'</option>';
        else
         $out.='<option value="'.$item['id'].'">'.$item[$data['view_data']].'</option>';
    }    
    $out.='</select></div>';
    if(gettype($data['errors'])=='array')
    {
        $out.='<div class="text-danger">';
        foreach($data['errors'] as $er)
        $out .=$er;
        $out.='</div>';
    }
    $out.='</div>';
  return $out;
}
function selectRow($data) 
{
    $out =  '<div class="form-group row"><label class="col-sm-2 col-form-label">';
    $out .= trans("cruds.".$data['label']);
    $out.='</label> <div class="col-sm-8"> <select name="';
    
    $out.=$data['name']??'';$out.='" class="form-control">';
    $out.='<option value=""> '.trans('cruds.select').' '.trans("cruds.".$data['label']).'</option>';
    foreach($data['items'] as $item)
    {
        if($item['id']==$data['value'])
        $out.='<option value="'.$item['id'].'"selected>'.$item[$data['view_data']].'</option>';
        else
        $out.='<option value="'.$item['id'].'">'.$item[$data['view_data']].'</option>';
    }    
    $out.='</select></div>';
    if(gettype($data['errors'])=='array')
    {
        $out.='<div class="text-danger">';
        foreach($data['errors'] as $er)
        $out .=$er;
        $out.='</div>';
    }
    $out.='</div>';
  return $out;
}


function table($items,$data,$controller="",$action=[])
{

    if(auth()->user()->type==2)
    return tableforManger($items,$data,$controller,$action);
    if((!auth()->user()->canany(["admin",'show_'.$controller]) && auth()->user()->type==1 ))
    return '';
    $out='';
    if(in_array('deleteMulti',$action)||in_array('display_order',$action))
    $out.= '<form method="POST" onsubmit="return confirm(\'Do you really want to submit the form?\');" id="display_order" action="'.route("$controller.destroy-multiple").'"accept-charset="UTF-8" style="display:inline">
    '.method_field('DELETE')
    .csrf_field();
    $out.='<table id="example1" class="table table-bordered table-striped"><thead><tr>';
    if(in_array('deleteMulti',$action))
    $out.='<th><input id="selectAll" class="selectAll" type="checkbox"></th>';

    

    foreach ($data  as $d)
    {
        $out.='<th>'.trans('cruds.'.$d).'</th>';
    }
    if(in_array('active',$action) && auth()->user()->canany(["admin",'edit_'.$controller]))
        $out.='<th>'.trans('cruds.suspend').'</th>';
    if(in_array('display_order',$action) && auth()->user()->canany(["admin",'edit_'.$controller]))

        $out.='<th >
        '.trans('cruds.display_order').'<a id="DisplayIcon" name="item" value="item" href="#"  onclick="document.getElementById(\'is_order\').value=\'true\';document.getElementById(\'display_order\').submit();"
        style="display: none; font-weight: bold" class="ajax-reorder">
        <i  class="far fa-save"></i> '.trans('cruds.save').'</a><div class="clear"></div></th>';

    // KG
    if(in_array('show_versions',$action)){
        $out.='<th>'.trans('cruds.organizations_changes').'</th>';
    }
    //   '<th class=" ajax-reorder"><a  href="#" onclick="document.getElementById(\'display_order\').submit();">'.trans('cruds.display_order').'</a><a id="DisplayIcon" href="javascript:void(0);" style="" class="ajax-reorder"> <i class="far fa-save"></i> Save</a><div class="clear"></div></th>';
    //   $out.='<th><a href="#" onclick="document.getElementById(\'display_order\').submit();">'.trans('cruds.display_order').'</a></th>';
    
    $out.='<th>'.trans('cruds.action').'</th>';
    $out.='</tr>
    </thead>
    <tbody>';
    
    foreach ($items as $item)
    {
        $out.='<tr>';
        if(in_array('deleteMulti',$action))
        $out.='<td><input type="checkbox" name="id[]" value="'.$item->id.'"></td>';
        foreach ($data  as $d)
        {
            if($d=='id'&& auth()->user()->canany(["admin",'show_'.$controller]) && in_array('view',$action) )
            $out.='<td ><a  href="'.route("$controller.show",$item->id).'" >'.$item->id.'</a></td>';
            elseif($d=='photo')
            $out.='<td><img width="100" height="100" src="'.$item->photo.'"></td>';
            elseif(in_array($d,['title_en','title_ar','desc_en','desc_ar']))
                $out.='<td style="max-width: 200px;overflow: hidden;word-wrap: break-word;text-overflow: ellipsis"> '.$item[$d].'</td>';
            else 
            $out.='<td> '.$item[$d].'</td>';
        
        }
        
        if(in_array('active',$action) && auth()->user()->canany(["admin",'edit_'.$controller]))
        {
        $out.='<td class="center">';

            $out.='<a class="dropdown-item" href="'.route("$controller.suspend",$item->id).'" >';
            $out.=$item->active==1?'
            <svg style="color:blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16"><path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/></svg>'
            :'<svg style="color:red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg>';
            $out.= '</a>' ;
            $out.='</td>';
        }
        if(in_array('display_order',$action ) && auth()->user()->canany(["admin",'edit_'.$controller]) ){
            $out.='<input  type="hidden" name="ids[]" value="'.$item->id.'">';
            $out.='<td> <input class="col-2 center" onfocus="viewDisplayIcon()" onkeyup="viewDisplayIcon()" onchange="viewDisplayIcon()" type="number" name="orders[]" value="'.$item->display_order.'"></td>';
        }
        // KG
        if(in_array('show_versions',$action) ){
            if(!empty($item->have_versions)){
                $out.='<td><a href="'.route("$controller.versions",$item->id).'">'.trans('cruds.show_changes').'</a></td>';
            }elseif(!empty($item->organization_new)){
                $out.='<td>'.trans('cruds.new_item').', <a href="'.route("$controller.show",$item->id).'">'.trans('cruds.review').'</a></td>';
            }else{
                $out.='<td>'.trans('cruds.no_changes').'</td>';
            }
        }

        $out.="<td>".action_form($item,$controller,$controller)."</td>";
        // ' <td>
        //     <div class="btn-group">  
        //         <button type="button" class="btn btn-default">'.trans('cruds.action').'</button>
        //         <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"> </button>
        //         <div class="dropdown-menu" role="menu">
        //         ';
        //         if(in_array('view',$action) && auth()->user()->canany(["admin",'show_'.$controller]))
        //             $out.='<a class="dropdown-item" href="'.route("$controller.show",$item->id).'" >'.trans('cruds.view').'</a>';

        //         if(in_array('accept',$action)&& auth()->user()->canany(["admin",'edit_'.$controller])){
        //             $out.='<a class="dropdown-item" href="'.route("$controller.accept",$item->id).'" >'.trans('cruds.accept').'</a>';
        //         }

        //         if(in_array('edit',$action)&& auth()->user()->canany(["admin",'edit_'.$controller]))
        //         $out.='<a class="dropdown-item" href="'.route("$controller.edit",$item->id).'" >'.trans('cruds.edit').'</a>';
            
        //             // $out.='<a class="dropdown-item" href="'.route("$controller.suspend",$item->id).'" >';
        //             //     $out.=$item->active==1?trans('cruds.suspend'):trans('cruds.unsuspend'); ;
        //             //     $out.= '</a>' ;
        //             if(in_array('delete',$action)&& auth()->user()->canany(["admin",'delete_'.$controller]))
        //             {
        //                 $out.= '<button class="deleteRecord" style="margin-left:6px;background: none; color: inherit; border: none; font: inherit; cursor: pointer; outline: inherit;" type="button" data-id="'. $item->id.'" >'.trans('cruds.delete').'</button>';
                    
        //             }

                    // $out.= '<form method="POST" action="'.route("$controller.destroy", $item->id).'"accept-charset="UTF-8" style="display:inline">
                    //     '.method_field('DELETE')
                    //     .csrf_field().
                    //     '<button type="submit"  style="margin-left:6px;background: none; color: inherit; border: none; font: inherit; cursor: pointer; outline: inherit;" onclick="return confirm(&quot;Confirm delete?&quot;)">'.trans('cruds.delete').'</button>
                    // </form>';
        //             $out.='
        //         </div>
        //     </div>
        // </td>';
        
        
        
        
        $out.='</tr>';
    }

    $out.='</tbody>';
    
    $out.='</table>';
    $out.='<input id="is_order" name="is_order" value="false" type="hidden">';
    
    // if(in_array('deleteMulti',$action)||in_array('display_order',$action))
    if(in_array('deleteMulti',$action)&& auth()->user()->canany(["admin",'delete_'.$controller]))
    {

        $out.='<div class="">';
        $out.='<select class=" form-control col-3  " style="display:inline ;margin:10px" name="type" id="selectOption">';

        if(in_array('display_order',$action)&& auth()->user()->canany(["admin",'edit_'.$controller]) )
        $out.='<option value="order">'.trans('cruds.order').'</option>';
        
        if(in_array('deleteMulti',$action)){
            $out.="<script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script><script>$('#selectAll').click(function(){  $('input[type=checkbox]').prop('checked', $(this).prop('checked'));});</script>";
            $out.='<option value="delete"> '.trans('cruds.delete_all').'</option>';
        }
        
        // onclick="'."return confirm('Are you sure you want to Delete?')".';" 

        $out.='</select>';
        $out.='<button   type="submit" class="btn btn-primary">'.trans('cruds.go').'</button>';
        $out.='<br><br>';
        $out.='</div>';
        $out.='<br><br>';
        $out.='<br></form>';

    }
    return $out;
}




function getSettingValue($key) {

    $jsonFilePath = public_path('settings_folder/settings.json');
    if (!file_exists($jsonFilePath)) {
        return 0; //
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $settings = json_decode($jsonContent, true);
    return isset($settings[$key]) ?$settings[$key]: 0; 
}


function getSeoValue($key) {

    $jsonFilePath = public_path('settings_folder/seo.json');
    if (!file_exists($jsonFilePath)) {
        return 0; //
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $seo = json_decode($jsonContent, true);
    return $seo[$key] ?? 0; 
}

function filter($data,$controller,$selectOption=[],$web='')
{
    // return  view('includes.filter',compact('data','controller','web','selectOption'));
}
function index_header($controller)
{
    $out = 
    '        <div class="col-sm-6">          
    <h1>'. trans("cruds.$controller") .'</h1>
    <br>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">
    <a href="'. route('home') .'">'. trans('cruds.home') .'</a>
    </li>
    <li class="breadcrumb-item active">'. trans("cruds.$controller") .'</li>
    </ol>
    </div>
    '
    ;
    return  $out ;
}

function getSendDate($key) {

    $jsonFilePath = public_path('settings_folder/send_data_time.json');
    if (!file_exists($jsonFilePath)) {
        return 0; //
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $settings = json_decode($jsonContent, true);
    return $settings[$key] ?? 0; 
}
function getPhotoData($key) {

    $jsonFilePath = public_path('settings_folder/photo.json');
    if (!file_exists($jsonFilePath)) {
        return 0; //
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $settings = json_decode($jsonContent, true);
    if(isset($settings[$key]))
    {
        if($key=='banner_link')
        {
            return $settings[$key];
        }
        return asset('images/web/'.$settings[$key]);
    }
    return asset('images/settings/'.getSettingValue('logo'));
}

function getPhotoDataAdmin($key) {

    $jsonFilePath = public_path('settings_folder/photo.json');
    if (!file_exists($jsonFilePath)) {
        return 0; //
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $settings = json_decode($jsonContent, true);
    if(isset($settings[$key]))
    {
        return asset('images/web/'.$settings[$key]);
    }
    return  null ;
}

function getLinkData($key) {

    $jsonFilePath = public_path('settings_folder/photo.json');
    if (!file_exists($jsonFilePath)) {
        return 0; //
    }
    $jsonContent = file_get_contents($jsonFilePath);
    $settings = json_decode($jsonContent, true);
    if(isset($settings[$key]))
    {
            return $settings[$key];
    }
    return null;
}



function getPart($key){
     $data = App\Entities\Admin\Part::where(['key'=>$key])->first();
        if($data )
            return $data->value;
}

use Carbon\Carbon;
function arabicDate($date)
{
    try {
        $carbonDate = Carbon::parse($date);        
        // تعيين اللغة العربية في Carbon
        $carbonDate->locale('ar');
        return $carbonDate->isoFormat('dddd, D MMMM YYYY');
    } catch (\Exception $e) {
        return $date;
    }

}

function text_editor($data)
{
    $out = '
    <div class="form-group m-1 ';
    if(isset($data["class"]))
    $out.=$data["class"];
    $out.=' ">';
    if(isset($data["label"]))
    {
        $out.='<label>';
        $out .= trans('cruds.'.$data["label"]);
        $out.='</label>';
    }
    $out.='<textarea  class="summernote editor " name="'.$data['name'].'" id="codeMirrorDemo">'.$data['value'].'</textarea>';
      
    if(gettype($data['errors'])=='array')
    {
        $out.='<div class="text-danger">';
        foreach($data['errors'] as $er)
        $out .=$er;
        $out.='</div>';
    }$out.= '</div>';
    
    return  $out ;

}
function th_view( $value,$label){

    return   "<tr><th>".trans("cruds.$label")." </th><td>$value</td></tr>";
  }
  