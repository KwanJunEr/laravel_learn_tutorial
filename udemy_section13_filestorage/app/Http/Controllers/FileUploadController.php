<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;
use Illuminate\Support\Facades\File as HandleFile; 

class FileUploadController extends Controller
{
    //
    function index(){

        //delete the file from storage and also from the database 
        // $file = File::find(6);
        // HandleFile::delete(public_path($file->file_path));
        // $file->delete();
        $files = File::all();
        return view('file-upload',['files'=>$files]);
    }

    function store(Request $request){
        // dd($request->all());

        //Method 1 of storing file data 
        //$file = Storage::disk('local')->put('/', $request->file('file'));
        
        //Method 2
        // $file =$request->file('file')->store('/', 'local');

        //Method 1: Submit file and upload to the public folder
        // $request->validate([
        //     'file'=>['required', 'image']
        // ]);

        //Method 1: Submit file and upload to the public folder
        $request->validate([
            'file'=>['required', 'file', 'mimes:zip, pdf,csv', 'max:3000' ]
        ]);

        
        $file = $request->file('file');
        $customName = 'laravel_' . Str::uuid();
        $ext = $file->getClientOriginalExtension(); //default function from laravel and give you the file ex tenion without the dot
        $fileName = $customName .  '.' . $ext;
        // $file = $request->file('file')->store('/', 'dir_public');

        //store custom file name
        $path = $file->storeAs('/', $fileName, 'dir_public');

        $fileStore = new File();
        $fileStore->file_path = '/uploads/'. $path;
        $fileStore->save();
        return redirect()->back();
    }

    function download(){
       $fileName = 'JXTuFXbQlqoqMnLcpnKimOTDIKSFe2rpFGek8VM3.html';
       $filePath =  $fileName;  //no need private folder 

         if (!Storage::disk('local')->exists($filePath)) {
        abort(404, 'File not found');
         }

        return response()->download(Storage::disk('local')->path($filePath));
    }
}
