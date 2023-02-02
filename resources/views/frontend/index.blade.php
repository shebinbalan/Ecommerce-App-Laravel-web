@extends('layouts.front')

@section('title')
Welcome to E-shop
@endsection

@section('content')
<!-- @include('layouts.inc.slider') -->
<div class="py-5">
    <div class="row">
        <h2>Featured Products</h2>
     <div class="owl-carousel featured-carousel owl-theme">
    <!-- <div class="item"><h4>1</h4></div> -->
     @foreach($featured_products as $prod)
        <div class="item">
            <div class="card">
                <img style="height:300px;" src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="product-image">
                <div class="card-body">
                    <h5>{{$prod->name}}</h5>
                  <span class="float-start">{{$prod->selling_price}}</span> 
                  <span class="float-end"><s>{{$prod->original_price}}</s></span>   
                </div>
            </div>
        </div>
        @endforeach    
</div>
       
    </div>
</div>


<div class="py-5">
    <div class="row">
        <h2>Trending Categories</h2>
     <div class="owl-carousel featured-carousel owl-theme">
    
     @foreach($trending_categories as $category)
    
        <div class="item">            
            <div class="card">
            <a href="{{url('view-category/'.$category->slug)}}">
                <img style="height:300px;" src="{{asset('assets/uploads/category/'.$category->image)}}" alt="product-image">
                <div class="card-body">
                    <h5>{{$category->name}}</h5>
                    <p>
                    {{$category->description}}
                    </p>  
                </div>
            </a>
            </div>
       
        </div>
        @endforeach   
</a> 
</div>
       
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});
});
</script>
@endsection