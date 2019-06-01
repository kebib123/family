<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends BackendController
{
    public function index()
    {
        return view($this->backendPagePath.'index');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->intended(route('signin'));
    }
}
