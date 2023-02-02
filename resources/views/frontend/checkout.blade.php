@extends('layouts.front')

@section('title')
Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
     <div class="container">
         <h6 class="mb-0">
            <a href="{{ url('/') }}">
Home
</a> /
<a href="{{ url('checkout') }}">
Checkout
</a> /

</h6>
</div>
</div>
<div class="container mt-3">
<form action="{{url('place-order')}}" method="POST">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control firstname" value="{{Auth::user()->name}}" name="fname" placeholder="Enter FirstName">
                            <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control lastname" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Last Name">
                            <span id="lname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control email" value="{{Auth::user()->email}}" name="email" placeholder="Enter Email">
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control phone" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Last Name">
                            <span id="phone_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 1</label>
                            <input type="text" class="form-control address1" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address1">
                            <span id="address1_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" class="form-control address2" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Address2">
                            <span id="address2_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" class="form-control city" value="{{Auth::user()->city}}" name="city"  placeholder="Enter City">
                            <span id="city_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" class="form-control state" value="{{Auth::user()->state}}" name="state" placeholder="Enter State">
                            <span id="state_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control country" value="{{Auth::user()->country}}" name="country" placeholder="Enter Country">
                            <span id="country_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pincode</label>
                            <input type="text" class="form-control pincode" value="{{Auth::user()->pincode}}" name="pincode" placeholder="Enter Pincode">
                            <span id="pincode_error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
            @php 
    $total =0;

    @endphp
                <div class="card-body">
                    Order Details
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $cartitems as $item)
                            <tr>
                           <td> {{$item->products->name}} </td>
                           <td>{{$item->prod_qty}}</td>
                           <td>{{$item->products->selling_price}}</td>
                            </tr>
                        @php $total +=$item->products->selling_price * $item->prod_qty;  @endphp
                        @endforeach
                        <!-- {{$total}} -->
                        </tbody>
                    </table>
                    <h6 class="px-2">Grand Total<span class="float-end">Rs {{ $total }}</span></h6>
                    <hr>
                    <button type="submit" class="btn btn-success w-100">Place Order</button>
                    <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button>
                   
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection