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
						<a class="product-item" href="{{ route('single_product', ['id'=>$product->id]) }}">
							<img src="{{ asset('frontend/images/' . $product->image) }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">{{$product->name}}</h3>
							<br>
							<h6 class="product-title">{{$product->category->title}}</h6>
							<br>
							<del class="product-price bold">{{$product->price}}</del>
							<strong class="product-price " style="margin-left: 50px">   {{$product->sale_price}}</strong>

							<span class="icon-cross">
								<img src="{{ asset('frontend/images/cross.svg') }}" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 2 -->

					@endforeach

				</div>
			</div>
		</div>
		<!-- End Product Section -->