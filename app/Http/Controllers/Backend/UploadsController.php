<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Intervention\Image\Facades\Image;

class UploadsController extends Controller
{
    private $uploadPath;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->uploadPath   = config('uploads.directory');
    }
    public function upload(Request $request){
        if($request->hasFile('file'))
        {
            $destinationPath = $this->uploadPath[$request->module];
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }
            if (!File::exists($destinationPath.'/thumbs')) {
                File::makeDirectory($destinationPath.'/thumbs', 0775, true);
            }
            $fileName = \Str::random(6) . '_' .time().'.'.$request->file('file')->getClientOriginalExtension();

            $file = $request->file('file')->move($destinationPath, $fileName);

            Image::make(($destinationPath.'/'.$fileName))->resize(300, 200)->save($destinationPath.'/thumbs/'.$fileName);
           

            return [ 'file_name'=>$fileName, 'file_path' => asset($destinationPath.'/'.$fileName)];
        }

    }

    public function uploadCkeditor(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            // $request->file('upload')->storeAs('public/images', $filenametostore);
            $request->file('upload')->move('images', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            // $url = asset('storage/uploads/'.$filenametostore); 
            $url = asset('images/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }
}
