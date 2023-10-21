<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Créez un nouvel utilisateur
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect('/users')->with('success', 'Utilisateur ajouté avec succès.');
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validez les données du formulaire ici (voir ci-dessous)

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('/users')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/users')->with('success', 'Utilisateur supprimé avec succès.');
        } else {
            return redirect('/users')->with('error', 'Utilisateur non trouvé.');
        }
    }

}
