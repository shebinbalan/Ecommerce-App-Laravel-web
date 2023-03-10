@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Products</h4>
    </div>
<div class="card-body">
    <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
           <div class="col-md-12 mb-3">
           <select class="form-control" name="cate_id"  >
            <option value="">{{$products->category->name}}</option>
                   
            </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$products->name}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$products->slug}}">
            </div>
            <div class="col-md-12 mb-3">
            <label for="">Small Description</label>
            <textarea name="small_description" id="small_description" rows="3" class="form-control">{{$products->small_description}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
            <label for="">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{$products->description}}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Original Price</label>
                <input type="number" class="form-control" name="original_price" value="{{$products->original_price}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Selling Price</label>
                <input type="number" class="form-control" name="selling_price" value="{{$products->selling_price}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" class="form-control" name="tax" value="{{$products->tax}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="qty" value="{{$products->qty}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" {{$products->status =='1' ? 'checked':''}} name="status">
            </div>
            <div class="col-md-6 mb-3">
            <label for="">Trending</label>
            <input type="checkbox" {{$products->trending =='1' ? 'checked':''}} name="trending">
            </div>
            <div class="col-md-12 mb-3">
            <label for="">Meta Title</label>
            <input type="text" class="form-control" name="meta_title" value="{{$products->meta_title}}">
            </div>
            <div class="col-md-12 mb-3">
            <label for="">Meta Keywords</label>
            <textarea name="meta_keywords" id="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
            <label for="">Meta Description</label>
            <textarea name="meta_description" id="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
            </div>
            
            @if($products->image)
            <img height="100px;" width="100px;" src="{{asset('assets/uploads/products/'.$products->image)}}" alt="products-image">
            @endif
            <div class="col-md-12">
            <input type="file" class="form-control" name="image">
            </div>
            <div class="col-md-12">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection