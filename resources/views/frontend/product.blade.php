@extends('frontend.layout.main')
@section('content')

		    <!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>shop</h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
									vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="{{ route('all_product') }}" class="btn btn-secondary me-2">Shop Now</a><a href="{{ route('about_us') }}"
										class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{ asset('frontend/images/couch.png') }}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Hero Section -->
		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

					<!-- Start Column 4 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="{{ asset('frontend/images/product-3.png') }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">Ergonomic Chair</h3>
							<strong class="product-price">$43.00</strong>

							<span class="icon-cross">
								<img src="{{ asset('frontend/images/cross.svg') }}" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 4 -->

                    
		      	</div>
		    </div>
		</div>

        @endsection

