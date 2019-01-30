<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFiles = File::orderBy('id', 'desc')->get();
        return view('bsd-admin.files.index', compact('allFiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $directory = 'images/' . date("Y") . '/' . date("m");
        foreach($request->pics as $file) {

            $currentFileName = $this->checkUniqueFile($file->getClientOriginalName());
            $newFile = new File();
            $newFile->name = $currentFileName;
            $newFile->type = $file->getMimeType();
            $newFile->extension = $file->getClientOriginalExtension();
            $newFile->size = $file->getClientSize();
            $newFile->directory = $directory;
            $file->move($directory, $currentFileName);
            $newFile->save();

        }

        return response()->json([
            'message' => 'success',
            'response' => 200
        ]);
    }

    public function checkUniqueFile($fileName, $i=1)
    {
        if($i == 1) {
            $pathinfoFilename = pathinfo($fileName, PATHINFO_FILENAME);
        } else {
            $pathinfoFilename = substr(pathinfo($fileName, PATHINFO_FILENAME), 0, -2);
        }

        if(File::where('name', $fileName)->count() > 0) {
            $fileName = pathinfo($pathinfoFilename, PATHINFO_FILENAME) . '_' . $i . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            $i++;
            return $this->checkUniqueFile($fileName, $i);
        } else {
            return $fileName;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
