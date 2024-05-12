@extends('layouts.master')

@section('page-css')

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />

@endsection

@section('main-content')
@include('layouts.admin_navbar')


<div class="container my-3">
   <table class="table table-dark" id="myTable">
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
                        <button type="submit" class="btn btn-danger mx-2"
                            onclick=" return confirm('Delete ?')">Delete</button>
                    </form>

                    <a type="button" class="btn btn-success" href="{{ route('book.show' ,$book->id) }}">Detail</a>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>


{{-- @include('layouts.footer' --}}
@endsection

@section('page-js')

<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection
