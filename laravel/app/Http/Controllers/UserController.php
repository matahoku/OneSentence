<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function delete(User $user)
    {
      $user->delete();
      return redirect('/');
    }

    public function edit(User $user)
    {
      return view('auth.user_edit', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
      $user->fill($request->all())->save();
      return redirect()->route('home', ['id' => $user->id]);
    }
}
