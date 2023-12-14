		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Recent Blog</h2>
					</div>

				</div>

				<div class="row">

					@foreach ($posts as $post)
						
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-5 ">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="{{ asset('frontend/images/' . $post->image) }}" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="{{ route('single_post', ['id'=>$post->id]) }}">{{$post->title}}</a></h3>
								<div class="meta">
									<span>by <a href="#">{{$post->team->name}}</a></span> <span>on <a href="#">{{$post->date}}</a></span>
								</div>
							</div>
						</div>
					</div>

					@endforeach

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	