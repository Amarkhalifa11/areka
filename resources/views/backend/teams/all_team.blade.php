@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px;">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>All team</h1>
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
                            <th scope="col">name</th>
                            <th scope="col">image</th>
                            <th scope="col">position</th>
                            <th scope="col">desc</th>
                            <th scope="col">user</th>
                            <th scope="col">edit</th>
                            <th scope="col">deleted</th>
                        </tr>
                    </thead>

                    <tbody>


                        @php
                            $i = 1;
                        @endphp

                        @foreach ($teams as $team)

                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $team->name }}</td>
                                <td><img src="{{ asset('frontend/images/' . $team->image) }}" width="50" alt="" srcset=""></td>
                                <td>{{ $team->position }}</td>
                                <td>{{ $team->desc }}</td>
                                <td>{{ $team->user->name }}</td>
                                <td><a href="{{ route('dashboard.team.edit', ['id'=>$team->id]) }}" class="btn btn-success rounded-pill">edit</a></td>
                                <td><a href="{{ route('dashboard.team.destroy', ['id'=>$team->id]) }}" class="btn btn-danger rounded-pill">delete</a></td>

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