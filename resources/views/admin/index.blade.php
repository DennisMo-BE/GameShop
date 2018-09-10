@extends('layouts.admin')
@section('content')
<h1 class="mb-3">Dashboard</h1>
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$totalproducts}}</p>
                            <p class="announcement-text"> Products</p>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="admin/products"> View <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$totalusers}}</p>
                            <p class="announcement-text">Users</p>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="admin/users">  View <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-money fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$totalorders}}</p>
                            <p class="announcement-text"> Orders</p>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">

                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="admin/orders">  View  <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-camera fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{$totalphotos}}</p>
                            <p class="announcement-text"> Photo's</p>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="admin/media"> View <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-lg-6">
        <h2>Last orders</h2>
        <div class="panel-body">
            <table class="table ">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order date</th>
                    <th>Name</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Shipping Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
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


    <div class="col-lg-6">
        <h2>Last products added</h2>
        <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @if($products)
                    @foreach($products as $product)
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>&euro; {{$product->price}}</td>
                        <td>{{str_limit($product->body,20)}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->created_at->format('d/m/Y')}}</td>
            </tr>
            @endforeach

            @endif
            </tbody>
        </table>
    </div>
    </div>
</div>



    @endsection