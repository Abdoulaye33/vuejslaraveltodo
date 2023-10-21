@extends('layouts.app')

@section('content')
    <h1>Liste des utilisateurs</h1>
    <ul>
        @foreach ($users as $user)
            <li>
                <b>username</b> : {{ $user->name }}
                <b>email</b> : {{ $user->email }}
                <b>password</b> : {{ $user->password }}
                <a href="{{ route('users.edit', ['id' => $user->id]) }}">EDIT</a>
                <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-link">DELETE</button>
                </form>
            </li>
        @endforeach
        <br><br>
        <button><a href="/users/create">CREATE</a></button>
    </ul>
@endsection
