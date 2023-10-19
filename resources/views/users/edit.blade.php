@extends('layouts.app')

@section('content')
    <h1>Modifier un utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" value="{{ $user->password }}">
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
