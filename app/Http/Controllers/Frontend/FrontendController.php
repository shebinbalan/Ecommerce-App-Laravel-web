<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending','1')->take(15)->get();
        $trending_categories = Category::where('popular','1')->take(15)->get();
        return view('frontend.index',compact('featured_products','trending_categories'));
    }

    public function category()
    {
        $category =Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug',$slug)->first();
            $products =Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('/frontend.products.index',compact('category','products'));
        }
        else{
            return redirect('/')->with('status','Slug doesnot exists');
        }
       
    }

    public function productview($cate_slug ,$prod_slug)
    {
if (Category::where('slug', $cate_slug)->exists()) {
    if (Product::where('slug', $prod_slug)->exists()) {

        $products = Product::where('slug',$prod_slug)->first();
        $ratings = Rating::where('prod_id',$products->id)->get();
        $ratings_sum = Rating::where('prod_id',$products->id)->sum('star_rated');
        $user_rating = Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
        $reviews =Review::where('prod_id',$products->id)->get();
        if($ratings->count() >0 )
        {
            $ratings_value = $ratings_sum/$ratings->count();
        }
        else
        {
            $ratings_value = 0;
        }

      

        return view('/frontend.products.view',compact('products','ratings','ratings_value','user_rating','reviews'));
    } else {
        return redirect('/')->with('status', 'Slug doesnot exists');
       }
      }
      else {
        return redirect('/')->with('status', 'No Such Category not found');
       }
    }
    public function productlistAjax()
    {
       $products =Product::select('name')->where('status','0')->get();
       $data=[];
       foreach($products as $item)
       {
        $data[] = $item['name'];
       }
       return $data;
    }

    public function searchProduct(Request $request)
    {
       $searched_product = $request->product_name;
       if($searched_product!='')
       {
           $product =Product::where("name","LIKE","%$searched_product%")->first();
           if($product)
           {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
           }
           else
           {
                return redirect()->back()->with('status','No products matched your search');
           }
       }
       else
       {
         return redirect()->back();
       }
    }
}
