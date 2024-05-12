@extends('layouts.master')
@section('page-css')

@endsection

@section('main-content')

@include('layouts.admin_navbar')



<div class="container mt-5">
    @include('layouts.alert')
    <h1>Book</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <a type="button" class="btn btn-success mb-4" href="{{ route('book.create') }}">Add Books</a>
            </div>
            <div class="col-lg-6">
                <form class="form-inline" action="{{ route('book.index')}}" method="GET">
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
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Publisher</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <img src="{{ asset('storage/books/book_covers/' .$book->book_cover) }}" style="max-width: 50px" alt="">
                </td>
                <th>{{ $book ->title}}</th>
                <td>{{ $book ->price}}</td>
                <td>{{ $book ->description}}</td>
                <td>{{ $book ->category_name}}</td>
                <td>{{ $book ->publisher_name}}</td>
                <td>{{ $book ->created_at}}</td>

                <td>


                    <div class="btn-group" role="group" aria-label="Basic example ">
                        <a type="button" class="btn btn-primary mx-1" href="{{ route('book.edit' ,$book->id) }}">Edit</a>
                        
                        <form action="{{route ('book.destroy' ,$book->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mx-2" onclick = " return confirm('Delete ?')">Delete</button>
                        </form>

                        <a type="button" class="btn btn-success" href="{{ route('book.show' ,$book->id) }}">Detail</a>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <section>
        <div class="pagination justify-content-center">
            {{ $books -> links() }}
        </div>
    </section>

</div>

@include('layouts.footer')

@endsection

@section('page-js')

@endsection
