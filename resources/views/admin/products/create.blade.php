@extends('layouts.admin')
@section('content')
    <h1>Create Product</h1>
    {!! Form::open(['method'=>'POST', 'action'=> 'AdminProductsController@store', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::number('price', null, ['class'=>'form-control']) !!}
    </div>
    <div id="divCategory">
        {!! Form::number('categories_amt',1,['id' => 'categories_amt', 'class' => 'hidden']) !!}
        <div class="form-group">
        {!! Form::label('category_id[]', 'Category:') !!}
        {!! Form::select('category_id[]', [''=>'Choose Categories'] + $categories , null, ['class'=>'form-control']) !!}
    </div>
    </div>
    <a href="#" onclick="event.preventDefault(); addCategory('divCategory')">Add Category</a>
    &nbsp;
   <a href="#" onclick="event.preventDefault(); removeCategory('divCategory')">Remove Category</a>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
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
        {!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}
    @include('includes.form_error')
@endsection

<script>
    var categoryCounter = 1;
    function addCategory(divName){
        {
            var newdiv = document.createElement('div');
            newdiv.classList.add('form-group');
            result = "<select id='category_id" + (categoryCounter+1) +  "' name='category_id[]" + (categoryCounter+1) + "' class='form-control categoryChoice'>";
            @foreach($categories as $key=>$value)
                result = result.concat("<option value='{{$key}}'>{{$value}}</option>");
            @endforeach
                result = result.concat('</select>');
            newdiv.innerHTML = result;
            document.getElementById(divName).appendChild(newdiv);
            categoryCounter++;
            $('#categories_amt').attr('value' , categoryCounter);
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