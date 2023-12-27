@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px;">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>All posts</h1>
<br>
</div>





<div class="row" style="margin-bottom: 200px">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">


                @if (session('message'))
                <h2 class="text-center text-success my-3">{{session('message')}}</h2>
                @endif


                <!-- Table with stripped rows -->
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">image</th>
                            <th scope="col">date</th>
                            <th scope="col">desc</th>
                            <th scope="col">team</th>
                            <th scope="col">created at</th>
                            <th scope="col">updated at</th>
                            <th scope="col">edit</th>
                            <th scope="col">deleted</th>
                        </tr>
                    </thead>

                    <tbody>


                        @php
                            $i = 1;
                        @endphp

                        @foreach ($posts as $post)

                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ asset('frontend/images/'. $post->image) }}" width="50" alt="" srcset=""></td>
                                <td>{{ $post->date }}</td>
                                <td>{{ $post->desc }}</td>
                                <td>{{ $post->team->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td><a href="{{ route('dashboard.posts.edit', ['id'=>$post->id]) }}" class="btn btn-success rounded-pill">edit</a></td>
                                <td><a href="{{ route('dashboard.posts.destroy', ['id'=>$post->id]) }}" class="btn btn-danger rounded-pill">delete</a></td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </div>
</div>

@endsection