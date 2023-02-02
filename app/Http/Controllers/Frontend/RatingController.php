<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
       $star_rated = $request->input('product_rating');
       $product_id = $request->input('product_id');
       $product_check = Product::where('id',$product_id)->where('status','0')->first();
       if($product_check)
       {
        $veryfied_purchase = Order::where('orders.user_id',Auth::id())
        ->join('order_items','orders.id','order_items.order_id')
        ->where('order_items.prod_id',$product_id)->get();
        if( $veryfied_purchase)
        {
            $exists_rating =Rating::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
            if($exists_rating->count()>0)
            {
                $exists_rating->star_rated = $star_rated;
                $exists_rating->update();
            }
            else
            {

           
                Rating::create([
                'user_id'=> Auth::id(),
                'prod_id'=>$product_id,
                'star_rated'=> $star_rated,

                ]);
            }
            return redirect()->back()->with('status',"Thank you for rate this product ");

        }
        else
        {
            return redirect()->back()->with('status',"You cannot rate this product without purchase");
        }

       }
       else
       {
           return redirect()->back()->with('status',"The link you followed was broken");
       }

    }
}