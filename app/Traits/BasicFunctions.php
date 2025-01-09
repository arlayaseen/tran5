<?php

namespace App\Traits;

trait BasicFunctions
{
    public function saveImage($image,$folder){
        $file_extention=$image->getClientOriginalExtension();
          $fileName=time().'.'.$file_extention;
          $path=$folder;
          $image->move($path,$fileName);

          return $fileName;

    }
}
