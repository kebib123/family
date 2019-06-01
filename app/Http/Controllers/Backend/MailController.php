<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class MailController extends Controller
{
    public function mail(Request $request)
    {
        Mail::send(new Contact());

        return redirect()->route('show-contact')->with('success','Mail sent');
    }
}
