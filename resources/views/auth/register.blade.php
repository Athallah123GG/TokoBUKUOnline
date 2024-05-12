@extends('layouts.master')

@section('page-css')

@endsection

@section('page-js')

@endsection

@section('main-content')

@include('layouts.navbar')

<div class="container" style="max-width: 400px; margin: auto; margin-top: 50px;">
    <h2 class="text-center mb-4">Register</h2>
    <form action="{{ route('storeUser') }}" method="post" class="mb-3">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


</div>

{{-- @include('layouts.footer') --}}

@endsection




