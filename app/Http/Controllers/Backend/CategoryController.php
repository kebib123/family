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
            $category = $this->category->getCategories();
            $cat = Category::all();
            $this->data('abc', $cat);
            $this->data('category', $category);
            $this->data('title', $this->setTitle('Category'));
            return view($this->backendcategoryPath . 'add_category', $this->data);
        }
        if ($request->isMethod('post')) {
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

    public function edit_category($id)
    {
        $cat = $this->category->getById( $id );
        return view($this->backendcategoryPath.'category_edit' )->with( [
            'allCategories' => $this->category->getCategories(),
            'cat'           => $cat
        ] );

    }
    public function update_category( Request $request, $id ) {
        $request->validate(  [
            'name' => 'required'
        ] );

        try {

            $this->category->update( $id, $request->all() );

        } catch ( Exception $e ) {

            throw new Exception( 'Error in updating category: ' . $e->getMessage() );
        }

        return redirect()->route('add-category')->with( 'success', 'Category successfully updated!' );
    }


}
