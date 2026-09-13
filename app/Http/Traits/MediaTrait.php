<?php
namespace App\Http\Traits;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
trait MediaTrait
{

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
    public function fileUploadWithName($path, $image,$name) {
            $destinationPath = public_path('images/'.$path);
            if( $image->move($destinationPath, $name))
               return $name;
            else return false;
    }

}
