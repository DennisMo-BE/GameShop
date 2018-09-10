@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('success'))
               <div class="alert alert-success">
                     {{ Session::get('success') }}
                   </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-center pb-lg-5 pb-4 pt-3 pt-lg-5 text-black">EDIT YOUR ACCOUNT</h1>
    <form action="{{ route('editaccount')}}" method="post">
        {{ csrf_field() }}
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="first_name">First name</label>
                <input name="first_name" class="form-control" type="text" id="first_name" value="{{ $user->first_name }}">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="last-name">Last name</label>
                <input name="last_name" class="form-control" type="text" id="last-name" value="{{ $user->last_name }}">
            </div>
        </div>
        <div class="row justify-content-center">
                <div class="form-group col-12 col-md-8 col-lg-6">
                    {!! Form::label('country_id', 'Country') !!}
                    {!! Form::select('country_id', $countries, $user->country->id, ['class' => 'form-control','style' => 'height: 35px;' ]) !!}
                </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="address1">Address</label>
                <input name="address" class="form-control" type="text" id="address" value="{{ $user->address }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="city">City</label>
                <input name="city" class="form-control" type="text" id="city" value="{{ $user->city }}">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="postal-code">Postal code</label>
                <input name="postal_code" class="form-control" type="text" id="postal-code" value="{{ $user->postal_code }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="phone">Phone number</label>
                <input name="phone" class="form-control" type="text" id="phone" value="{{ $user->phone }}">
            </div>
            <div class="form-group col-6 col-md-4 col-lg-3">
                <label for="email">E-mail</label>
                <input name="email" class="form-control" type="email" id="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="row justify-content-center py-1 py-md-2">
            <div class="form-group col-12 col-md-8 col-lg-6">
                <label for="password">New password</label>
                <input name="password" class="form-control" type="password" id="password">
                    <p class="form-text text-muted">Leave field empty if you wish to not update your password</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary text-white px-5 py-2">Update</button>
        </div>
    </form>
    </div>
@endsection