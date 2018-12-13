<?php

namespace App\Http\Controllers;

use App\Mail\PrayerMail;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PrayerRequestController extends Controller
{
    public function store(Request $request)
    {
        Mail::to('cjustinobi@gmail.com')->send(new PrayerMail($request));
        Mail::to($request->email)->send(new FeedbackMail($request));
    }
}
