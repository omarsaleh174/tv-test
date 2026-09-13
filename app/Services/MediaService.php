<?php
namespace App\Services;

class MediaService

{
    public function __construct()
    {
    }

    public function delete_image($filePath)
    {
        // dd($filePath);

        if (file_exists($filePath)) {
        return unlink($filePath);
        }
        return false;
    }
    public function fileUpload($path, $image,$concatenation='') {

            $name = time().$concatenation.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/'.$path);
            if( $image->move($destinationPath, $name))
               return $name;
            else return false;
    }
    }
