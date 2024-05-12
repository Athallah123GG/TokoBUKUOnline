@extends('layouts.master')
@section('page-css')

@endsection

@section('main-content')
    @include('layouts.navbar')

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-6">
                <img src = "{{ asset('storage/books/book_covers/' .$book->book_cover) }}" class="card-img-top" alt="...">
            </div>
            <div class="col-lg-6">
                <h2>{{ $book->title }}</h2>
                <p>{{ $book->description }}</p>
                <p><strong>Price:</strong> Rp{{ $book->price }}</p>
                <p><strong>Publisher:</strong> {{ $book->publisher_name }}</p>
                <p><strong>Category:</strong> {{ $book->category_name }}</p>

                @include('layouts.alert')

                <form action="{{ route('cart.store') }} " method="POST">
                    @csrf
                    <input hidden="text" name="book_id" id="" value="{{ $book->id }}">
                    <input hidden="text" name="user_id" id="" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>

            </div>
        </div>
        <hr>

        {{-- related book  --}}
        <section>
            <div class="container">
                <div class="row">
                    @foreach ($book as $books)
                    <div class="col-md-4 my-5">
                        <div class="card" style="width: 18rem;">
                            <img src = "{{ asset('storage/books/book_covers/' .$book->book_cover) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $book -> title }}</h5>
                              <p class="card-text">Penerbit : {{ $book -> publisher_name }}</p>
                              <p class="card-text">Harga : ${{ $book -> price }}</p>
                            </div>
                            <a type="button" class="btn btn-success" href="{{ route('book.show' ,$book->id) }}">Detail</a>
                          </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>

    </div>
@endsection

@section('page-js')

@endsection
