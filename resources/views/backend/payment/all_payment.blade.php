@extends('backend.layout.index')
@section('content')
<div class="text-center bold " style="margin-top: 50px;">

    <h1>the user : {{Auth::user()->name}}</h1>
    <h1>All Payment</h1>
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
                            <th scope="col">order_id</th>
                            <th scope="col">transaction_id</th>
                            <th scope="col">date</th>
                            <th scope="col">created at</th>
                            <th scope="col">updated at</th>
                            <th scope="col">deleted</th>
                        </tr>
                    </thead>

                    <tbody>


                        @php
                            $i = 1;
                        @endphp

                        @foreach ($payments as $payment)

                            <tr>
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $payment->order_id }}</td>
                                <td>{{ $payment->transaction_id }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>{{ $payment->updated_at }}</td>
                                <td><a href="{{ route('dashboard.payment.destroy', ['id'=>$payment->id]) }}" class="btn btn-danger rounded-pill">delete</a></td>

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