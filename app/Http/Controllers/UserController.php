<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::paginate(10); // Traemos a los usuarios paginados
        return view('users.index', compact('users'));
    }

    // Muestra el formulario de creación
public function create()
{
    return view('users.create');
}

// Recibe los datos y los guarda en la BD
public function store(Request $request)
{
    // 1. Validar los datos
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // 2. Crear el usuario
    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // 3. Redireccionar con un mensaje de éxito
    return redirect()->route('users.index')->with('status', 'Usuario creado con éxito.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // Muestra el formulario con los datos del usuario
public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

   // Procesa el cambio en la base de datos
public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed', // Contraseña opcional al editar
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('users.index')->with('status', 'Usuario actualizado correctamente.');
}

    public function destroy(User $user)
{
    // Evitar que el usuario se borre a sí mismo
    if (auth()->id() == $user->id) {
        return redirect()->route('users.index')->with('status', 'No puedes eliminar tu propia cuenta.');
    }

    $user->delete();
    return redirect()->route('users.index')->with('status', 'Usuario eliminado con éxito.');
    }
}
