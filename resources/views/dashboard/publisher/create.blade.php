@extends('layouts.master')
@section('page-css')

@endsection

@section('main-content')
@include('layouts.admin_navbar')



<div class="container mt-5">

    @include('layouts.alert')

    <form action="{{ route('publisher.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputtext1">Name</label>
            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Address</label>
            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="address">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Phone</label>
            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="phone">
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection

@section('page-js')

@endsection
