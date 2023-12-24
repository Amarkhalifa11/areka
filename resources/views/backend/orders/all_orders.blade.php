@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px;">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>All orders</h1>
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
                            <th scope="col">cost</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">city</th>
                            <th scope="col">adress</th>
                            <th scope="col">phone</th>
                            <th scope="col">status</th>
                            <th scope="col">date</th>
                            <th scope="col">deleted</th>
                        </tr>
                    </thead>

                    <tbody>


                        @php
                            $i = 1;
                        @endphp

                        @foreach ($orders as $order)

                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $order->cost }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->adress }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->date }}</td>
                                <td><a href="{{ route('dashboard.orders.destroy', ['id'=>$order->id]) }}" class="btn btn-danger rounded-pill">delete</a></td>

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