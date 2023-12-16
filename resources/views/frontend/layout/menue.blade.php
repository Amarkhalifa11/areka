		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
						<p><a href="{{ route('all_product') }}" class="btn">shop</a></p>
					</div> 
					<!-- End Column 1 -->

					@foreach ($products as $product)
						

					<!-- Start Column 2 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						{{-- <a class="product-item" href=""> --}}
							<img src="{{ asset('frontend/images/' . $product->image) }}" class="img-fluid product-thumbnail">
							<a href="{{ route('single_product', ['id'=>$product->id]) }}">
								<h3 href="" class="product-title">{{$product->name}}</h3>
							</a>
							<br>
							<h6 class="product-title">{{$product->category->title}}</h6>
							<br>
							<del class="product-price bold">{{$product->price}} $</del>
							<strong class="product-price " style="margin-left: 50px">   {{$product->sale_price}} $</strong>


<br>

<form action="{{ route('add_to_cart') }}" method="POST">
	@csrf

	<input type="hidden" name="id" value="{{$product->id}}">
	<input type="hidden" name="name" value="{{$product->name}}">
	<input type="hidden" name="image" value="{{$product->image}}">
	<input type="hidden" name="price" value="{{$product->price}}">
	<input type="hidden" name="sale_price" value="{{$product->sale_price}}">
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
							
						{{-- </a> --}}
					</div> 
					<!-- End Column 2 -->

					@endforeach

				</div>
			</div>
		</div>
		<!-- End Product Section -->