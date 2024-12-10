@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <h1>Ro`yxatdan o`tish</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">F.I.O:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="password">Parol:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Parolni takrorlang:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit">Ro`yxatdan o`tish</button>
        </form>
        <p>Sizda allaqachon hisob mavjudmi? <a href="{{ route('login.form') }}">Kirish</a></p>
    </div>
@endsection
