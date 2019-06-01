<?php
/**
 * Created by PhpStorm.
 * User: Bibek
 * Date: 5/14/2019
 * Time: 12:36 PM
 */

namespace App\Composer;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\View\View;

class CategoryComposer
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
       $category =$this->category->getCategories();

        $view->with([
            'cat'=>$category
        ]);
    }
}