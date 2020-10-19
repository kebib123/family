<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends BackendController
{
    private $category;

    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->category = $category;
    }


    public function add_category(Request $request)
    {
        if ($request->isMethod('get')) {
            $cat = Category::all();
            $this->data('abc', $cat);
            $this->data('title', $this->setTitle('Category'));
            return view($this->backendcategoryPath . 'add_category', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'parent_id' => 'required',
            ]);
            $data['name'] = $request->name;
            $data['parent_id'] = $request->parent_id;

            if (Category::create($data)) {
                Session::flash('success', 'categories added');
                return redirect()->back();
            }

        }

    }

    public function delete_category(Request $request)
    {
        $id = $request->id;
        $this->category->delete($id);
        return redirect()->back()->with('success', 'Category successfully deleted!!');

    }

    public function edit_category(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $cat = Category::where('id', '=', $id)->first();
            $this->data('edit_cat', $cat);
            return view($this->backendcategoryPath . 'category_edit', $this->data);
        }
        if ($request->isMethod('post')) {
            $id = $request->id;
            $data['name'] = $request->name;
            $data['parent_id'] = $request->parent_id;
            $new = Category::findorfail($id);

            if ($new->update($data)) {
                Session::flash('success', 'Categories updated');
                return redirect()->back();
            }

        }

    }


}
