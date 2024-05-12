
@extends('layouts.master')
@section('page-css')

@endsection

@section('main-content')

@include('layouts.navbar')
<div class="container" style="max-width: 400px; margin: auto; margin-top: 100px;">
    <h2 class="text-center mb-4">Login</h2>
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
  </form>

    <div class="text-center mt-3">
        <a href="{{ route('register') }}" class="btn btn-link">Register</a>
    </div>

</div>
{{-- @include('layouts.footer') --}}
@endsection
@section('page-js')

@endsection



