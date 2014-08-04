<?php

class UploadsController extends BaseController {


    public function postIndex(){
        // Grab our files input
        $files = Input::file('files');
        // We will store our uploads in public/uploads/basic
        $assetPath = '/uploads';
        $uploadPath = public_path($assetPath);
        // We need an empty arry for us to put the files back into
        $results = array();

        foreach ($files as $file) {
            // store our uploaded file in our uploads folder
            $filename=time().'_'.$file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            // set our results to have our asset path
            $name=$file->getClientOriginalName();
            $url = url($assetPath . '/' . $filename);
            $extension=$file->getClientOriginalExtension();
            $results[] = array('name'=>$name,'url'=>$url,'extension'=>$extension);
        }

        // return our results in a files object
        return Response::json(array(
            'files' => $results
        ));
    }
}