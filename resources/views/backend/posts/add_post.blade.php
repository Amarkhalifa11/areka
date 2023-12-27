@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px; ">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>Add Post</h1>
<br>
</div>




    <div class="row" style="margin-bottom: 100px">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('dashboard.posts.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf



                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">post title</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="post title" name="title" class="form-control" id="inputText">
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">post image</label>
                            <div class="col-sm-10">
                                <input type="file" placeholder="post image" name="image" class="form-control" id="inputText">
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">post date</label>
                            <div class="col-sm-10">
                                <input type="date" placeholder="post date" name="date" class="form-control" id="inputText">
                            </div>
                            @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">post desc</label>
                            <div class="col-sm-10">
                                <textarea placeholder="post desc" name="desc" class="form-control" id="inputText"></textarea>
                            </div>
                            @error('desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">post team </label>
                            <div class="col-sm-10">
                                <select name="team_id" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>

                                    @foreach ($teams as $team)
                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                    
                                </select> 

                            </div>
                                @error('team_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>





                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">add post</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>

        </div>
    </div>
@endsection
