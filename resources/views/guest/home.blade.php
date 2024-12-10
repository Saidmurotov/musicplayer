@extends('layouts.app')

@section('content')
    <div class="home-container">
        <h1>Jalol ohanglari</h1>
        <p>Sizning sevimli musiqa platformangiz.</p>

        @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" style="display: inline; background: whitesmoke">
                @csrf
                <button type="submit">Chiqish</button>
            </form>
        @else
            <div class="auth-buttons">
                <a href="{{ route('login.form') }}" class="btn btn-primary">Kirish</a>
                <a href="{{ route('register.form') }}" class="btn btn-secondary">Ro`yxatdan o`tish</a>
            </div>
        @endif
    </div>
@endsection
