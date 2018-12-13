<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('category')->orderBy('created_at', 'desc')->get();
        return $programs;
    }

    public function store(Request $request)
    {
        $imagePath = 'storage/' . $request->image->store('images', 'public');
        $image = new Image;
        $image->file_path = $imagePath;
        $image->save();

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
}
