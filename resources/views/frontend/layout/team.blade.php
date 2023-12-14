<!-- Start Team Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Our Team</h2>
            </div>
        </div>

        <div class="row">

            @foreach ($teams as $team)
                
            <!-- Start Column 1 -->
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                <img src="{{ asset('frontend/images/' . $team->image) }}" class="img-fluid mb-5">
                <h3 clas><span class="">{{$team->name}}</span></h3>
                <h6 class="d-block position mb-4">{{$team->position}}.</h6>
                <p>{{$team->desc}}.</p>
                </div>
                <!-- End Column 1 -->
                
            @endforeach



        </div>
    </div>
</div>
<!-- End Team Section -->
