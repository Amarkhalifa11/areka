<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

class TestimonialController extends Controller
{

    public function all_opinian_api()
    {
        $opinians = Testimonial::all();
        return response()->json($opinians, 200);
    }

    public function create()
    {
        //
    }

    public function store(StoreTestimonialRequest $request)
    {
        //
    }

    public function show(Testimonial $testimonial)
    {
        //
    }

    public function edit(Testimonial $testimonial)
    {
        //
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        //
    }

    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
