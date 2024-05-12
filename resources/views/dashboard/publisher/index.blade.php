@extends('layouts.master')
@section('page-css')


@section('main-content')

    @include('layouts.admin_navbar')

    <div class="container mt-5">

        @include('layouts.alert')
        <h1>Publisher</h1>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <a type="button" class="btn btn-success mb-4" href="{{ route('publisher.create') }}">Add Publisher</a>
                </div>
                <div class="col-lg-6">
                    <form class="form-inline" action="{{ route('publisher.index')}}" method="GET">
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
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($publishers as $publisher)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $publisher ->name}}</td>
                    <td>{{ $publisher ->address }}</td>
                    <td>{{ $publisher ->phone }}</td>
                    <td>{{ $publisher ->created_at }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="{{ route('publisher.edit' ,$publisher->id) }}">Edit</a>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

        <section>
            <div class="pagination justify-content-center">
                {{ $publishers -> links() }}
            </div>
        </section>
    </div>

    @include('layouts.footer')

@endsection

@section('page-js')

@endsection
