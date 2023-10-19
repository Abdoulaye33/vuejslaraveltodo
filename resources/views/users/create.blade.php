@extends('layouts.app')

@section('content')
    <h1>Ajouter un utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Ajouter</button>
    </form>
@endsection
