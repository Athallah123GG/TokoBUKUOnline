@extends('layouts.master')
@section('page-css')

@endsection
@section('main-content')
    @include('layouts.admin_navbar')

    <div class="container">
        <form class="w-50 mx-auto mt-5" action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('layouts.alert')
        <div class="form-group">
          <label for="">Create Category</label>
          <input type="text" class="form-control" id="" aria-describedby="" name="name" value="{{ $category->name }}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control" id="" aria-describedby="" name="description" value="{{ $category->description }}" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>


@endsection
@section('page-js')

@endsection
