@extends('frontend.layout.main')
@section('content')
    



<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            
            
            <!-- Start Column 4 -->
            <div class="col-4 col-md-4 col-lg-4 mb-5" style="margin-left: 400px">
                <a class="product-item" href="#">
                    <img src="{{ asset('frontend/images/' . $products->image) }}" width="200px" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$products->name}}</h3>
                    <br>
                    <h3  class="product-title">{{$products->category->title}}</h3>
                    <br>
                    <del class="product-price">{{$products->price}}</del>
                    <strong class="product-price " style="margin-left: 50px">   {{$products->sale_price}}</strong><br>
                    <br>
                    <h5 class="product-price">Added by :: {{$products->user->name}}</h5>
                    <br>
                    <h5 class="product-price">category :: {{$products->category->title}}</h5>
                    
                    <span class="icon-cross">
                        <img src="{{ asset('frontend/images/cross.svg') }}" class="img-fluid">
                    </span>
                </a>
                <br>
                <h6 class="product-price">Description ::{{$products->desc}}</h6>
            </div>
            <!-- End Column 4 -->


            
          </div>
    </div>
</div>


@endsection