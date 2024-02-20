@extends('template.master')

@section('title', 'Welcome to Petugas')

@section('rowTengah')
    <h1>Welcome to Petugas</h1>
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <input type="submit" value="LogOut" class="btn btn-primary">
    </form>
@endsection
