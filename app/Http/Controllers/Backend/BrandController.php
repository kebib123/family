<?php

namespace App\Http\Controllers\Backend;

use App\Model\Brand;
use App\Repositories\Contracts\BrandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BrandController extends BackendController
{
    private $brand;

    public  function __construct(BrandRepository $brand)
    {
        parent::__construct();
        $this->brand=$brand;
}

    public function manage_brand(Request $request)
    {
        if($request->isMethod('get'))
        {
            $brand = $this->brand->show();
            $this->data('brand',$brand);
            $this->data('title', $this->setTitle('Brand'));
            return view($this->backendbrandPath . 'manage_brand', $this->data);
        }

        if($request->isMethod('post'))
        {
            if($this->brand->add_brand($request))
            {
                return redirect()->back();
            }

        }
return false;
    }

    public function delete_brand(Request $request)
    {
        $id=$request->id;
        $del=Brand::findorfail($id);
        if($this->delete_file($id)&&$del->delete())
        {
            Session::flash('success','Brand deleted successfully');
            return redirect()->back();
        }
    }
    public function delete_file($id)
    {
        $findData = Brand::findorfail($id);
        $fileName = $findData->brand_image;
        $deletePath = public_path('images/brands/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function edit_brand(Request $request)
    {
        if($request->isMethod('get'))
        {
            $id=$request->id;
            $brand=Brand::findorfail($id);
            $this->data('brand',$brand);
            $this->data('title', $this->setTitle('Brand'));
            return view($this->backendbrandPath . 'edit_brand', $this->data);

        }
        if ($request->isMethod('post'))
        {
            $id=$request->id;
            $request->validate([
                'brand_name'=>'required',
                'company_name'=>'required',
            ]);
            $data['brand_name']=$request->brand_name;
            $data['company_name']=$request->company_name;
            $data['status']=$request->status;

            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/brands/');
                $image->move($destinationPath, $name);
                $data['brand_image'] = $name;
            }
            $create=Brand::findorfail($id);
            if ($create->update($data))
            {
                Session::flash('success','Brands updated');
                return redirect()->back();
            }
        }
    }
    public function brand_status(Request $request)
    {
        $id=$request->brand;

        $brand=Brand::findorfail($id);

        if(isset($_POST['active']))
        {
            $brand->status=0;
        }
        if(isset($_POST['inactive']))
        {
            $brand->status=1;
        }
        $save=$brand->update();
        if($save)
        {
            Session::flash('success','Status updated');
            return redirect()->back();
        }
    }

}
