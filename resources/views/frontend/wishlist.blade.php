@extends('layouts.front')

@section('title')
My Cart
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
     <div class="container">
         <h6 class="mb-0">
            <a href="{{ url('/') }}">
Home
</a> /
<a href="{{ url('wishlist') }}">
My Wishlist
</a> /

</h6>
</div>
</div>



<div class="container my-5">
<div class="card shadow wishlistitems">
    <div class="card-body">

    
    @if($wishlist->count() >0)
@foreach($wishlist as $item)
<div class="row">
<div class="col-md-2">
<img src="{{asset('assets/uploads/products/'.$item->products->image)}}" width="70px" height="70px" alt="Image here">
</div>
<div class="col-md-2 my-auto">
<h6>{{$item->products->name}}</h6>
</div>
<div class="col-md-2 my-auto">
<h6>{{$item->products->selling_price}}</h6>
</div>
<div class="col-md-2 my-auto">
<input type="hidden" class="prod_id" value="{{$item->prod_id}}">
@if($item->products->qty >= $item->prod_qty)
<label for="Quantity">Quantity</label>
<div class="input-group text-center mb-3" style="width:130px;">
<button class="input-group-text changeQuantity decrement-btn">-</button>
<input type="text" name="quantity" class="form-control qty-input text-center" value="1">
 <button class="input-group-text changeQuantity increment-btn">+</button>
</div>

<h6>In Stock</h6>
@else 
<h6>out of stock</h6>
   
@endif
</div>
<div class="col-md-2 my-auto">
    <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i>Add to Cart</button>

</div>
<div class="col-md-2 my-auto">
    <button class="btn btn-danger delete-wishlist-item "><i class="fa fa-trash"></i>Remove</button>

</div>
</div>

@endforeach
</div>
    @else
    <h4>There is no products in your Wishlist</h4>
    @endif
  </div>
</div>
</div>
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
