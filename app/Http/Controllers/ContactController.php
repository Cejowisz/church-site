<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller

{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'message' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        Mail::to('cjustinobi@gmail.com')->send(new ContactMail($request));
        Mail::to($request->email)->send(new FeedbackMail($request));

//        return response();


    }
}
