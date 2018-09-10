@extends('layouts.admin')
@section('content')
    @if(Session::has('success'))
           <div class="alert alert-success">
                 {{ Session::get('success') }}
               </div>
    @endif
    <h2>Products</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tbody>
                <tr>
                    @if($products)
                        @foreach($products as $product)
                    <td>{{$product->id}}</td>
                            <td><img height="50" src="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}"  alt=""></td>
                            <td><a href="{{route('admin.products.edit', $product->id)}}">{{$product->title}}</a></td>

                        <td>&euro; {{$product->price}} (Excl BTW)</td>

                            <td>{{str_limit($product->body,20)}}</td>
                            <td>{{$product->quantity}}</td>
                    <td>{{$product->created_at->format('d/m/Y, H:i')}}</td>
                    <td>{{$product->updated_at->format('d/m/Y, H:i')}}</td>
                </tr>
                @endforeach


        </tbody>
    </table>
    @else
        <h1>No comments</h1>
    @endif
        @endsection
