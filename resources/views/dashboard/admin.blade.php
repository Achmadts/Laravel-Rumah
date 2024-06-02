@extends('template.master')

@section('title', 'Welcome to Admin')

@section('rowTengah')
    <h1>Selamat datang <span class="bg-primary text-white p-1 rounded-3">{{ $user->nama_petugas }}</span> sebagai Admin</h1>
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <input type="submit" value="LogOut" class="btn btn-primary" onclick="return confirm('Yakin mau logout?')">
    </form>
@endsection
