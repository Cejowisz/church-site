<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with(['category', 'image'])->orderBy('created_at', 'desc')->get();
        return $programs;
    }

    public function show($id)
    {
        return Program::findorFail($id);
    }

    public function store(Request $request)
    {
        $image = $this->saveImage($request);

        $program = new Program;

        $program->title = $request->title;
        $program->description = $request->description;
        $program->start_date = $request->start_date;
        $program->end_date = $request->end_date;
        $program->image_id = $image->id;
        $program->category_id = $request->category_id;

        if ($program->save()) {
            return $this->index();
        }

    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        return $request->file('image');

//        $image = $this->saveImage($request);

        $program->title = $request->title;
        $program->description = $request->description;
        $program->start_date = $request->start_date;
        $program->end_date = $request->end_date;
//        $program->image_id = $image->id;
        $program->category_id = $request->category_id;

        $program->save();

        Storage::delete(substr($image->file_path, 8));

        return $this->index();

    }

    public function destroy($id)
    {
        $gallery = Program::find($id);
        $e = substr($gallery->image_path, 9);
        Storage::delete($e);
        $gallery->image()->delete();
        $gallery->delete();
        return $this->index();
    }

    public function saveImage($req){
        $imagePath = 'storage/' . $req->file('image')->store('images', 'public');
        $image = new Image;
        $image->file_path = $imagePath;
        $image->save();
        return $image;
    }
}
