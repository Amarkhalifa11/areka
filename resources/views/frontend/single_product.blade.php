@extends('frontend.layout.main')
@section('content')
    



<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            
            
            <!-- Start Column 4 -->
            <div class="col-4 col-md-4 col-lg-4 mb-5" style="margin-left: 400px">
                <a class="product-item" href="#">
                    <img src="{{ asset('frontend/images/' . $products->image) }}" width="200px" class="img-fluid product-thumbnail">
                    <a href="{{ route('single_product', ['id'=>$products->id]) }}">
                        <h3 href="" class="product-title">{{$products->name}}</h3>
                    </a>                    <br>
                    <h3  class="product-title">{{$products->category->title}}</h3>
                    <br>
                    <del class="product-price">{{$products->price}} $</del>
                    <strong class="product-price " style="margin-left: 50px">   {{$products->sale_price}} $</strong><br>
                    <br>
                    <h5 class="product-price">Added by :: {{$products->user->name}}</h5>
                    <br>
                    <h5 class="product-price">category :: {{$products->category->title}}</h5>
                    
                </a>
                <br>
                <h6 class="product-price">Description ::{{$products->desc}}</h6>

                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{$products->id}}">
                    <input type="hidden" name="name" value="{{$products->name}}">
                    <input type="hidden" name="image" value="{{$products->image}}">
                    <input type="hidden" name="price" value="{{$products->price}}">
                    <input type="hidden" name="sale_price" value="{{$products->sale_price}}">
                    <input type="hidden" name="quantity" value="1">
<br>
                    <button type="submit" style="border: none;">

                        <a style="margin-left: 100px; ">
                        
                            <svg  xmlns="http://www.w3.org/2000/svg" 
                            width="16" 
                            height="16" 
                            fill="currentColor" 
                            class="bi bi-bag" .
                            viewBox="0 0 16 16">
                                <path  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                              </svg>
                        
                        </a>

                    </button>

                </form>
            </div>
            <!-- End Column 4 -->


            
          </div>
    </div>
</div>


@endsection