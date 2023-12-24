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

    public function all_testimonials()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonials.all_testimonials' , compact('testimonials'));
    }

    public function destroy($id)
    {
        $testimonials = Testimonial::find($id);
        $testimonials->delete();
        return redirect()->route('dashboard.testimonials.all_testimonials')->with('message' , 'the Testimonial is deleted sucessfully');
    }
}
