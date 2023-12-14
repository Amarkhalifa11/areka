@extends('frontend.layout.main')
@section('content')

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6" style="margin-left: 550px">
						<h1 class="section-title">single  Blog</h1>
					</div>

				</div>

				<div class="" style="margin-left: 400p ">

						
					<div class="" >
						<div class="post-entry">
							<a  class="post-thumbnail"><img src="{{ asset('frontend/images/' . $posts->image) }}" width="300px" alt="Image" class="img-fluid"></a>
							<div class="">
								<h2>{{$posts->title}}</h2>
								<div class="meta ">
									<span>by <a href="#">{{$posts->team->name}}</a></span> <span>on <a href="#">{{$posts->date}}</a></span>
								</div>
                                <h6>{{$posts->desc}}</h6>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

@endsection