@extends('layouts.admin')
@section('content')
    <h1>Edit Product</h1>
    {!! Form::model($product,['method'=>'PATCH', 'action'=> ['AdminProductsController@update', $product->id],'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::number('price', null, ['class'=>'form-control']) !!}
    </div>
    <div id="divCategory">
        {!! Form::number('categories_amt', $product->categories->count(),['id' => 'categories_amt', 'class' => 'hidden']) !!}
    @foreach($product->categories as $key => $category)
        <div class="form-group">
            @if($key == 0)
                {!! Form::label('category_id1[]', 'Category/Categories') !!}
            @endif
            {!! Form::select('category_id[]' .($key+1), $categories, $category->id,['id' => 'category_id' . ($key+1), 'class' => 'form-control']) !!}
        </div>
    @endforeach
    </div>
    <a href="#" onclick="event.preventDefault(); addCategory('divCategory')">Add Category</a>
    <a href="#" onclick="event.preventDefault(); removeCategory('divCategory')">Remove Category</a>
    <div class="form-group">
        {!! Form::label('photo', 'Photo:') !!}
        {!! Form::file('photo_id', null , ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity:') !!}
        {!! Form::number('quantity', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Product', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    {!! Form::open(['method'=> 'DELETE', 'action'=> ['AdminProductsController@destroy', $product->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete product',['class'=>'btn btn-danger col-sm-6']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
@endsection


<script>
    var categoryCounter = {{$product->categories->count()}}
    function addCategory(divName){

        {
            var newdiv = document.createElement('div');
            newdiv.classList.add('form-group');
            result = "<select id='category_id[]" +  "' name='category_id[]" + "' class='form-control categoryChoice' onchange='setSizes()'>";
            @foreach($categories as $key=>$value)
                result = result.concat("<option value='{{$key}}'>{{$value}}</option>");
            @endforeach
                result = result.concat('</select>');
            newdiv.innerHTML = result;
            document.getElementById(divName).appendChild(newdiv);
            $('#categories')
        }
    }

    function removeCategory(){
        if(categoryCounter == 1){
            alert("You have to pick at least 1 category");
        }else{
            var id = '#category_id' + categoryCounter;
            var amt = '#categorys_amt';

            $(id).remove();
            categoryCounter--;
            $(amt).attr('value', categoryCounter);
        }
    }
</script>