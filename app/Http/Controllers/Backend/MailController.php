<?php

namespace App\Http\Controllers\Backend;

use App\Mail\Subscriber;
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
    public function subscriber()
    {
        Mail::send(new Subscriber());

        return redirect()->route('show-subscriber')->with('success','Mail sent');
    }
}
