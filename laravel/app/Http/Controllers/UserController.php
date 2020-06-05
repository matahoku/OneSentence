<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      $post = $request->all();
      if ($request->hasFile('image')) {
          $deleteImageName = $user->image;
          $deletePath = storage_path() . '/app/public/images/' . $deleteImageName;
          \File::delete($deletePath);

          $request->file('image')->store('/public/images');
          $data = ['introduction' => $post['introduction'],
                  'image' => $request->file('image')->hashName()];
      } else {
          $data = ['introduction' => $post['introduction']];
      }
      $user->fill($data)->save();
      return redirect()->route('home', ['id' => $user->id]);
    }
}
