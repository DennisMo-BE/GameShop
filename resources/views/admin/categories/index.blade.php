@extends('layouts.admin')
@section('content')

    <h2>Categories</h2>
    <div class="col-sm-6">
        {!! Form::open(['method'=> 'POST', 'action'=>'AdminCategoriesController@store', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Delete</th>
            {{--<th>Created</th>--}}

        </tr>
        </thead>
        <tbody>
        <tr>
            @if($categories)
                @foreach($categories as $category)
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                    {{--<td>{{$category->created_at ? $category->created_at->diffForHumans() : 'not available'}}</td>--}}
                    <td> {!! Form::open(['method'=> 'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-3']) !!}
                    </div>
                    {!! Form::close() !!}</td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>

@endsection
