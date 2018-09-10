@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order date</th>
                            <th>Name</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                                <td>€ {{$order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.orders.show', $order->id) }}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
