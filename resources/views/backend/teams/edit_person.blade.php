@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px; ">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>edit person</h1>
<br>
</div>




    <div class="row" style="margin-bottom: 100px">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('dashboard.team.update', ['id'=>$team->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3 mt-5">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="name" value="{{$team->name}}" name="name" class="form-control" id="inputText">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">position</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="position" value="{{$team->position}}" name="position" class="form-control" id="inputText">
                            </div>
                            @error('position')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">description</label>
                            <div class="col-sm-10">
                                <textarea type="text" placeholder="desc"  name="desc" class="form-control" id="inputText">{{$team->desc}}"</textarea>
                            </div>
                            @error('desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="inputText">
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">edit category</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>

        </div>
    </div>
@endsection
