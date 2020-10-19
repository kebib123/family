<?php

namespace App\Http\Controllers\Backend;

use App\Model\SlideShow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SlideController extends BackendController
{
    public function manage_slide(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $slides=SlideShow::all();
            $this->data('slides',$slides);
            return view($this->backendslidePath.'add_slide',$this->data);
        }
        if($request->isMethod('post'))
        {
            $request->validate([
                'slide_name'=>'required',
                'image'=>'required',
                'status'=>'required',
                'section'=>'required',
                'link'=>'required'
            ]);
            $data['name']=$request->slide_name;
            $data['status']=$request->status;
            $data['section']=$request->section;
            $data['link']=$request->link;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/slides/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            if(SlideShow::create($data))
            {
                Session::flash('success','Slides added');
                return redirect()->back();
            }


        }
    }
    public function slide_status(Request $request)
    {
        $id=$request->status;

        $slide=SlideShow::findorfail($id);

        if(isset($_POST['active']))
        {
            $slide->status=0;
        }
        if(isset($_POST['inactive']))
        {
            $slide->status=1;
        }
        $save=$slide->update();
       if($save)
       {
           Session::flash('success','Status updated');
           return redirect()->back();
       }
    }
    public function delete_slide($id)
    {
        $del=SlideShow::findorfail($id);
        if($this->delete_file($id)&&$del->delete())
        {
            Session::flash('success','Slides deleted');
            return redirect()->back();
        }
    }
    public function delete_file($id)
    {
        $findData = SlideShow::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/slides/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function edit_slide(Request $request)
    {
        if($request->isMethod('get'))
        {
            $id=$request->id;
            $slide=SlideShow::findorfail($id);
            $this->data('slide',$slide);
            $this->data('title', $this->setTitle('Slideshow'));
            return view($this->backendslidePath . 'edit_slide', $this->data);
        }

        if($request->isMethod('post'))
        {
            $id=$request->id;
            $request->validate([
                'slide_name'=>'required',
                'status'=>'required',
                'section'=>'required',
                'link'=>'required'
            ]);
            $data['name']=$request->slide_name;
            $data['status']=$request->status;
            $data['section']=$request->section;
            $data['link']=$request->link;

            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/slides/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $insert=SlideShow::findorfail($id);
            if ($insert->update($data))
            {
                Session::flash('success','Slides updated');
                return redirect()->route('manage-slide');
            }
        }
    }
}
