<?php

namespace App\Repositories\Eloquent;

use App\Model\Brand;
use App\Repositories\Contracts\BrandRepository;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Session;
use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentBrandRepository extends AbstractRepository implements BrandRepository
{
    private $model;

    public function __construct(Brand $model )
    {
        parent::__construct();
        $this->model = $model;
    }
    public function entity()
    {
         return Brand::class;

    }

    public function show() {
        $show=$this->model->all();

        return $show;

    }
    public function add_brand($request)
    {
        $request->validate([
            'brand_name'=>'required',
            'company_name'=>'required',
            'image'=>'required'
        ]);
        $data['brand_name']=$request->brand_name;
        $data['company_name']=$request->company_name;
        $data['status']=$request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/brands/');
            $makefile = Image::make($image);
            $save = $makefile->resize(400, '400', function ($ar) {
                $ar->aspectRatio();
            })->save($destinationPath . '/' . $ext);
            $data['brand_image'] = $ext;
        }
        $create=Brand::create($data);
         return $create;

    }
}
