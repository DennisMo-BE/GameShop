@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="container">
            @if(Session::has('success'))
                   <div class="alert alert-success">
                         {{ Session::get('success') }}
                       </div>
            @endif
        </div>
        <row>
            <div class="col-lg-12">
                <h1> Order History - {{$user->first_name}} {{$user->last_name}} </h1>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="pr-2">Order no.</th>
                        <th class="pr-2">Order date</th>
                        <th class="table-desc-width">Products</th>
                        <th class="pr-2">Status</th>
                        <th class="pr-2 text-right">Total amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->orders as $order)
                        <tr>
                            <td>
                                #{{ $order->id }}
                            </td>
                            <td>
                                {{ $order->created_at->format('d/m/Y') }}
                            </td>
                            <td>

                                @foreach($order->products()->with('orders')->get() as $stock)
                                    <a href='{{url("products/details/$stock->id")}}'>{{$stock->title}}</a> | <strong>Amount : {{ $stock->pivot->amount }}</strong> <br>
                                @endforeach
                            </td>

                            <td>{{ $order->status }}</td>
                            <td class="text-right">&euro;&nbsp;{{ $order->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </row>
    </div>

@endsection