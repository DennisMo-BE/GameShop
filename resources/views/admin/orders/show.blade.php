@extends('layouts.admin')
@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h3>Order ID: {{$order->id}}</h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <br>
                            <strong>Billed To:</strong><br>
                            <ul class="list-unstyled">
                                <li>Name: {{ $order->first_name . ' ' . $order->last_name }}</li>
                                <li>Email: {{ $order->email }}</li>
                            </ul>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Billing address:</strong><br>
                                <ul style="list-style:none;">
                                    <li>{{ $order->address }}</li>
                                    <li>{{ $order->postal_code . ' ' . $order->city }}</li>
                                    <li>{{ $order->country->name }}</li>
                                    <br>
                                  <strong>Delivery address:</strong>  <li>{{$order->delivery_address}}</li>
                                </ul>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Payment Method:</strong><br>
                            <ul class="list-unstyled">
                                <li>{{ $order->payment_method }}</li>
                                <li>Status: {{ $order->status }}</li>
                            </ul>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            <ul class="list-unstyled">
                                <li>{{ $order->created_at->format('d/m/Y') }}</li>
                                <li>{{ $order->created_at->format('H:i') }}</li>
                            </ul>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order details</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->products()->with('orders')->get() as $ordered)
                                    <tr>
                                        <td>{{ $ordered->id}}</td>
                                        <td>{{ $ordered->title }}</td>
                                        <td>{{ $ordered->pivot->amount }}</td>
                                        <td>€ {{ $ordered->pivot->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection