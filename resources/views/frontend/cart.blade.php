@extends('frontend.layout.main')
@section('content')
    
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>

                        @if (Session::has('cart'))
                        @foreach (Session::get('cart') as $product)
                            

                        <tr>
                          <td class="product-thumbnail">
                            <img src="{{ asset('frontend/images/'. $product['image']) }}" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{$product['name']}}</h2>
                          </td>
                          <td>{{$product['price']}}</td>
                          <td>


                          <form action="{{ route('edit_quantity') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">

                              <input type="submit" value="-" name="decrease" class="edit-btn" style="border: none">
                              <input type="hidden" name="id" value="{{$product['id']}}">
                              <input type="text" readonly name="quantity" class="form-control text-center quantity-amount" value="{{$product['quantity']}}" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <input type="submit" value="+" name="increase" class="edit-btn" style="border: none">

                            </div>
        
                          </form>


                          </td>
                          <td>$ {{$product['quantity'] * $product['price']}}</td>

                          <form method="POST" action="{{ route('remove_from_cart') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$product['id']}}">

                            <td><input type="submit" name="remove_btn" value="remove" style="border: none" ></td>

                          </form>
                        </tr>


                        @endforeach
                        @endif


                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>

                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        @if (Session::has('cart'))
                        @if (Session::has('total'))
                            
                        
                        <div class="col-md-6 text-right">
                          <strong class="text-black">${{Session::get('total')}}</strong>
                        </div>
                        
                        @endif
                        @endif

                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		

          @endsection
