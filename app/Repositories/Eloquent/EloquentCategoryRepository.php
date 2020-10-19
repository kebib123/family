<?php

namespace App\Repositories\Eloquent;

use App\Model\Category;
use App\Repositories\Contracts\CategoryRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentCategoryRepository extends AbstractRepository implements CategoryRepository
{
    private $model;


    public function __construct( Category $model ) {
        parent::__construct();

        $this->model = $model;
    }


    public function getAll() {
        return $this->model->all();
    }
    public function entity()
    {
        return Category::class;
    }

    public function getCategories()
    {
        $categories = Category::where('parent_id', 0)->get();

        $categories = $this->addRelation($categories);
        return $categories;
    }

    public function addRelation($categories)
    {
        $categories->map(function ($item, $key) {
            $sub = $this->selectChild($item->id);

            return $item = array_add($item, 'subCategory', $sub);
        });
        return $categories;
    }

    public function selectChild($id)
    {
        $categories = Category::where('parent_id', $id)->get();

        $categories = $this->addRelation($categories);

        return $categories;
    }

    public function getById( $id ) {
        return $this->model->findOrFail( $id );
    }
    public function delete( $id ) {


        $category = $this->getById( $id );
        // Delete from pivot table as well
        $subs = Category::where('parent_id', $category->id)->get();
        $id = Category::where('parent_id', $category->id)->pluck('id');
        $child=Category::wherein('parent_id',$id)->get();
        foreach ($child as $value) {
            $value->delete();
        }
        foreach ($subs as $sub) {

            $sub->delete();

        }
        $category->delete();


        return true;

    }



}
