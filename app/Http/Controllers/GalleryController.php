<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::all();
        return $galleries;
    }

    public function store(Request $request)
    {

        $galleries = [];

        foreach ($request->details as $item) {

            if (! empty($item)) {

                $galleries[] = [
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'image_path' => 'storage/' . $item['image']->store('galleries', 'public')
                ];

            }
        }

        if (Gallery::insert($galleries)) {
            return $this->index();
        }

    }
}
