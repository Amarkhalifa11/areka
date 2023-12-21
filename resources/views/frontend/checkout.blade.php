@extends('frontend.layout.main')
@section('content')


		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">

		      <div class="row">
                <h2>checkout : </h2>
		        <div class="col-md-12 mb-5 mb-md-0">
		          <div class="p-3 p-lg-5 border bg-white">

                    <form action="{{ route('place_order') }}" method="post">
                    @csrf

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_fname" class="text-black">Name </label>
		                <input type="text" class="form-control" id="c_fname" name="name">
		              </div>

		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_companyname" class="text-black">email</label>
		                <input type="email" class="form-control" id="c_companyname" name="email">
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Address</label>
		                <input type="text" class="form-control" id="c_address" name="adress" >
		              </div>
		            </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                          <label for="c_fnwame" class="text-black">phone </label>
                          <input type="text" class="form-control" id="c_fnwame" name="phone">
                        </div>
  
                      </div>

                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="aac_fnwame" class="text-black">city</label>
                          <input type="text" class="form-control" id="aac_fnwame" name="city">
                        </div>
  
                      </div>  

                      <div class="row">
                        @if (Session::has('total'))
                        @if (Session::get('total') != 0)
                            
                        <form action="" method="POST">
                          @csrf
                          <input type="submit" value="checkout" class="btn btn-black btn-lg py-3 btn-block">
                        </form>

                        @endif
                        @endif

                      </div>

                    </form>
		          </div>
		        </div>

		      </div>
		      <!-- </form> -->
		    </div>
		  </div>






@endsection