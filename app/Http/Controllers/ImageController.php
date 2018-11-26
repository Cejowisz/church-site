<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    // Gets all registered courses
    public function index() {
        $image = Image::orderBy('created_at', 'desc')
            ->get();
        return response($image);
    }

    // Show single image registered
    public function show($id) {
      $image = Image::find($id);
      if($image) {
        return response($image);
      }
      return response('Something went wrong', 500);
    }


    // Save image registration
    public function store(Request $request) {

        $new_image = $request->file('image');
        $image_name = time() . '.'. $new_image->getClientOriginalExtension();
        $destination_path = public_path('/images');
        $new_image->move($destination_path, $image_name);
        $input['name'] = $image_name;
        $input['ip_address'] = $request->ip();
        $input['user_agent'] = $request->server('HTTP_USER_AGENT');

        $image = new Image();
        if($image->create($input)){
            return response($image->latest()->first());
        }
        return response()->json([
            'success' => false
        ], 500);
        
    }


    // Update image Registration
    public function update(Request $request, $id) {

        // $validator = Validator::make($request->all(), [
        //   'administrator_id' => 'required|integer',
        //   'result_id' => 'required|integer',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }

        $image = new Image;

        $image->name = $request->name;
        $image->ip_address = $request->ip();
        $image->user_agent = $request->server('HTTP_USER_AGENT');

        if ($image->save()) {
            return $this->index();
        }
        return response('Something went wrong', 500);
    }


    // Delete image Registration
    public function destroy($id) {
        $image = Image::find($id);
        $image->delete();

        return $this->index();
    }
}
