@extends('layouts.master')
@section('page-css')

@endsection
@section('main-content')
    @include('layouts.admin_navbar')

    <form class="w-50 mx-auto mt-5" action="{{ route('publisher.update', $publisher->id) }}" method="POST">

        @csrf

        @include('layouts.alert')
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputtext1">Name</label>
            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="name" value="{{ $publisher->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Address</label>
            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="address" value="{{ $publisher->address }}">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Phone</label>
            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="phone" value="{{ $publisher->phone }}">
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
@section('page-js')

@endsection
