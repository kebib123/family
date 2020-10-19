<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Faq;
use App\Http\Resources\SocialMedia;
use App\Model\About;
use App\Model\Contact;
use App\Model\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class FooterController extends Controller
{
public function about()
{
    $abt = About::all();
    return \App\Http\Resources\About::collection($abt);
}
public function faq()
{
    $faq=\App\Model\Faq::all();
    return Faq::collection($faq);
}
public function contact()
{
    $contact=Contact::all();
    return \App\Http\Resources\Contact::collection($contact);
}
public function media()
{
    $media=Media::all();
    return SocialMedia::collection($media);
}
}
