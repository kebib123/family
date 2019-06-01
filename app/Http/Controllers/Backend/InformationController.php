<?php

namespace App\Http\Controllers\Backend;

use App\Model\About;
use App\Model\Contact;
use App\Model\ContactForm;
use App\Model\Faq;
use App\Model\Media;
use App\Model\User;
use Cocur\Slugify\Bridge\Twig\SlugifyExtension;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InformationController extends BackendController
{
    public function edit_about(Request $request)
    {
        if ($request->isMethod('get')) {
            $about = About::all();
            $this->data('about', $about);
            $this->data('title', $this->setTitle('Information'));
            return view($this->backendPagePath . 'edit_about', $this->data);
        }

        if ($request->isMethod('post')) {

            $id = $request->id;

            $data['mission'] = $request->mission;
            $data['about'] = $request->about;

            $abt = About::findorfail($id);
            if ($abt->update($data)) {
                Session::flash('success', 'Data updated');
                return redirect()->back();
            }
        }
    }

    public function edit_faq(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $faq = Faq::where('id', '=', $id)->get();
            $this->data('faq', $faq);
            $this->data('title', $this->setTitle('Information'));
            return view($this->backendPagePath . 'edit_faq', $this->data);
        }
        if ($request->isMethod('post')) {
            $id = $request->id;
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $fq = Faq::findorfail($id);
            if ($fq->update($data)) {
                Session::flash('success', 'Faq updated');
                return redirect()->back();
            }
        }
    }

    public function show_contact(Request $request)
    {
        if ($request->isMethod('get')) {
            $form = ContactForm::all();
            $this->data('form', $form);
            $this->data('title', $this->setTitle('Information'));
            return view($this->backendPagePath . 'show_contact', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'message' => 'required',
                'name' => 'required',
                'email' => 'required'
            ]);
            $data['message'] = $request->message;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            if (ContactForm::create($data)) {
                Session::flash('success', 'Message sent');
                return redirect()->back();
            }
        }
    }

    public function delete_contact(Request $request)
    {
        $id = $request->id;
        $del = ContactForm::findorfail($id);
        if ($del->delete()) {
            Session::flash('success', 'Message was deleted');
            return redirect()->back();
        }
    }

    public function add_contact(Request $request)
    {
        if ($request->isMethod('get')) {
            $contact = Contact::all();
            $this->data('contact', $contact);
            $this->data('title', $this->setTitle('Information'));
            return view($this->backendPagePath . 'add_contact', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'toll' => 'required',
                'contact' => 'required',
                'email' => 'required',
                'address' => 'required',
                'website' => 'required'
            ]);
            $data['toll'] = $request->toll;
            $data['phone'] = $request->contact;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['website'] = $request->website;

            if (Contact::create($data)) {
                Session::flash('success', 'Contact posted successfully');
                return redirect()->back();
            }
        }
    }

    public function add_media(Request $request)
    {
        if ($request->isMethod('get')) {
            $media = Media::all();
            $this->data('media', $media);
            $this->data('title', $this->setTitle('Information'));
            return view($this->backendPagePath . 'add_media', $this->data);
        }
        if ($request->isMethod('post')) {
            $id = $request->id;
            $data['facebook'] = $request->facebook;
            $data['google'] = $request->google;
            $data['twitter'] = $request->twitter;
            $data['instagram'] = $request->instagram;

            $med = Media::findorfail($id);
            if ($med->update($data)) {
                Session::flash('success', 'Media Updated');
                return redirect()->back();
            }
        }
    }

    public function add_faq(Request $request)
    {
        if ($request->isMethod('get')) {
            $faq = Faq::all();
            $this->data('faq', $faq);
            $this->data('title', $this->setTitle('Information'));
            return view($this->backendPagePath . 'add_faq', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required',
                'description' => 'required'
            ]);
            $data['title'] = $request->title;
            $data['description'] = $request->description;

            if (Faq::create($data)) {
                Session::flash('success', 'Faq Added');
                return redirect()->back();
            }
        }
    }

    public function show_faq(Request $request)
    {
        if ($request->isMethod('get')) {
            $faq = Faq::all();
            $this->data('faq', $faq);
            $this->data('title', $this->setTitle('Information'));
            return view($this->backendPagePath . 'show_faq', $this->data);
        }
    }

    public function delete_faq(Request $request)
    {
        $id = $request->id;
        $del = Faq::findorfail($id);
        if ($del->delete()) {
            Session::flash('success', 'Faq deleted successfully');
            return redirect()->back();
        }
    }

    public function reply(Request $request)
    {
        $id = $request->id;
        $contact = ContactForm::where('id', '=', $id)->get();
        $this->data('contact', $contact);
        return view($this->backendPagePath . 'reply', $this->data);
    }

    public function add_user(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required'
            ]);
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['password'] = bcrypt($request->password);
            $data['roles'] = 'user';

            if (User::create($data)) {
                Session::flash('success', 'successfully registered');
                return redirect()->back();
            }
        }
    }

    public function show_user(Request $request)
    {
        if ($request->isMethod('get')) {
            $user = User::all();
            $this->data('user', $user);
            $this->data('title', $this->setTitle('User'));
            return view($this->backendPagePath . 'show_user', $this->data);
        }
    }

    public function delete_user(Request $request)
    {
        $id = $request->id;
        $del = User::findorfail($id);
        if ($del->roles == 'admin') {
            return back()->with('error', 'Cant delete admin');
        }
        if ($del->delete()) {
            Session::flash('success', 'User deleted successfully');
            return redirect()->back();
        }
    }
}


