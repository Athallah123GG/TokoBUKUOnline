@extends('layouts.master')
@section('page-css')

@endsection

@section('main-content')
@include('layouts.admin_navbar')
<div class="container mt-5">

    @include('layouts.alert')


    <h1>Categories</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <a type="button" class="btn btn-success mb-4" href="{{ route('category.create') }}">Add Category</a>
            </div>
            <div class="col-lg-6">
                <form class="form-inline" action="{{ route('category.index')}}" method="GET">
                    <label class="sr-only" for="inlineFormInputName2">Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                  </form>
            </div>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category ->name}}</td>
                <td>{{ $category ->description }}</td>
                <td>{{ $category ->created_at }}</td>
                <td>
                    <a type="button" class="btn btn-primary" href="{{ route('category.edit' ,$category->id) }}">Edit</a>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    <section>
        <div class="pagination justify-content-center">
            {{ $categories -> links() }}
        </div>
    </section>
</div>


@include('layouts.footer')

@endsection

@section('page-js')

@endsection
