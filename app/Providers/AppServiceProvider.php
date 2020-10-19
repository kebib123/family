<?php

namespace App\Providers;

use App\Model\About;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Faq;
use App\Model\Media;
use App\Model\Order;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\User;
use App\Repositories\Contracts\BrandRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Eloquent\EloquentBrandRepository;
use App\Repositories\Eloquent\EloquentCategoryRepository;
use App\Repositories\Eloquent\EloquentProductRepository;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\General\General;

class AppServiceProvider extends ServiceProvider
{
    use General;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CategoryRepository::class,EloquentCategoryRepository::class);
        $this->app->singleton(BrandRepository::class,EloquentBrandRepository::class);
        $this->app->singleton(ProductRepository::class,EloquentProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();
        Schema::defaultStringLength('191');

        $med = Media::all();
        $this->data('med', $med);
        $about = About::all();
        $this->data('about', $about);
        $faq=Faq::all();
        $this->data('faq',$faq);
        $contact=Contact::all();
        $this->data('contact',$contact);

        $brand=Brand::all();
        $this->data('brand',$brand);
        $order = Order::all();
        $this->data('order', $order);
        $user = User::all();
        $this->data('user', $user);
        $pro = Product::all();
        $this->data('product', $pro);


        View::share($this->data);
    }
}
