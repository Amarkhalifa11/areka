@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px; ">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>Add Service</h1>
<br>
</div>




    <div class="row" style="margin-bottom: 100px">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('dashboard.service.store') }}" method="POST" >
                        @csrf
                        <div class="row mb-3 mt-5">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">service title</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="service title" name="title" class="form-control" id="inputText">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">service icon</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="service title" name="icon" class="form-control" id="inputText">
                            </div>
                            @error('icon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">service desc</label>
                            <div class="col-sm-10">
                                <textarea type="text" placeholder="service desc" name="desc" class="form-control" id="inputText"></textarea>
                            </div>
                            @error('desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">add service</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>

        </div>
    </div>
@endsection
