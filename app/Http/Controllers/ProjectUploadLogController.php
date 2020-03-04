<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectRegistration;
use App\ProjectUploadLog;
use Illuminate\Support\Facades\Storage;

class ProjectUploadLogController extends Controller
{
    public function storeUpload($id, Request $request)
    {
        // $path = Storage::putFileAs('ProjectFiles', $request->file('projectfiles'), $file->getClientOriginalName(),);

        $validation = $request->validate([
            'projectFile' => 'required|mimes:jpeg,doc,docx'
        ]);
            
        $projectFile = $request->file('projectFile');
        // $extension = $projectFile->getClientOriginalExtension();
        $filename = $projectFile->getClientOriginalName();
        $paths = Storage::putFileAs('ProjectFiles', $projectFile, $filename);
        //sample:  $path = Storage::putFileAs('Images/'.$foldername, $file, 'image1'); //Images/img-1234567/image1

        // return dd(
        ProjectUploadLog::create([
            'filename' => $filename,
            'file_url' => Storage::url($paths),
            'file_path' => $paths,
            'project_id' => $id,
        ]);
    
        //dd($paths);
    }


    public function viewFile($id)
    {
        
        // Get file upload for the project
        $fileUploads = ProjectRegistration::find($id)-> fileUpload;

        // show list page
        return view('iSparkRegistration.file_list_view', ['fileUploads'=> $fileUploads, 'id' => $id]);
    }

    // public function downloadFile($id, Request $request)
    // {
    //     $downloadFile = ProjectRegistration::download($id)->fileUpload;

    //     return ProjectRegistration::download($id->);
    // }
}
