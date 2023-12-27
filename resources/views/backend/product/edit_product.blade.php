@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px; ">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>edit product</h1>
<br>
</div>




    <div class="row" style="margin-bottom: 100px">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('dashboard.product.update', ['id'=>$product->id]) }}" method="POST"  enctype="multipart/form-data">
                        @csrf



                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">product name</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="product name" name="name"  value="{{$product->name}}" class="form-control" id="inputText">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">product quantity</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="product quantity" name="quantity"  value="{{$product->quantity}}" class="form-control" id="inputText">
                            </div>
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">prouct image</label>
                            <div class="col-sm-10">
                                <input type="file" placeholder="prouct image" name="image" class="form-control" id="inputText">
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">product price</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="product price" name="price"  value="{{$product->price}}" class="form-control" id="inputText">
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">product sale_price</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="product sale_price" name="sale_price" class="form-control" value="{{$product->sale_price}}" id="inputText">
                            </div>
                            @error('sale_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">product desc</label>
                            <div class="col-sm-10">
                                <textarea placeholder="product desc" name="desc" class="form-control" id="inputText">{{$product->desc}}</textarea>
                            </div>
                            @error('desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3 mt-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">product category </label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>

                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                    
                                </select> 

                            </div>
                                @error('team_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>





                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">edit product</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>

        </div>
    </div>
@endsection
