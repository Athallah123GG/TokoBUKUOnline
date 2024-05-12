@extends('layouts.master')

@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')

<section>
    <div class="jumbotron ">
        <div class="container">
            <h1 class="display-4">Welcome To GRAMEDIYAORI</h1>
        <p class="lead">This is a Simple Book Store , You can Order & buy Books In Here</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="#" role="button">EXPLORE!</a>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @foreach ($books as $book)
            <div class="col-md-4 my-5">
                <div class="book-card card" style="height:100%;">
                    <img src = "{{ asset('storage/books/book_covers/' .$book->book_cover) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $book -> title }}</h5>
                      <p class="card-text">Penerbit : {{ $book -> publisher_name }}</p>
                      <p class="card-text">Harga : Rp{{ $book -> price }}</p>
                    </div>
                    <a type="button" class="btn btn-success" href="{{ route('book.show' ,$book->id) }}">Detail</a>
                  </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section>
    <div class="pagination justify-content-center">
        {{ $books -> links() }}
    </div>
</section>

@include('layouts.footer')
@endsection

@section('page-js')

@endsection




