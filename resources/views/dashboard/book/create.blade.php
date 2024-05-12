@extends('layouts.master')
@section('page-css')

@endsection
@section('main-content')
@include('layouts.admin_navbar')

<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container mt-5">

        @include('layouts.alert')

        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="name" placeholder="Title" name="title">
        </div>
        <div class="form-group">
            <label for="text">Price</label>
            <input type="text" class="form-control" id="text" placeholder="Price" name="price">
        </div>
        <div class="form-group">
            <label for="message">Description</label>
            <textarea class="form-control" id="message" rows="4" placeholder="Description"
                name="description"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="">Publisher</label>
            <select class="custom-select" id="inputGroupSelect02" name="publisher_id">
                @foreach ($publishers as $publisher)
                   <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Category</label>
            <select class="custom-select form-control" id="inputGroupSelect02" name="category_id">
                @foreach ($categories as $category)
                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name= "book_cover">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</form>
@endsection
@section('page-js')

@endsection
