<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function delete(User $user)
    {
      if (isset($user->image)) {
        $deleteImageName = $user->image;
        $deletePath = storage_path() . '/app/public/images/' . $deleteImageName;
        \File::delete($deletePath);
      }

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

          //以前の画像をストレージから削除
      if ($request->hasFile('image')) {
          $deleteImageName = $user->image;
          $deletePath = storage_path() . '/app/public/images/' . $deleteImageName;
          \File::delete($deletePath);

          //画像リサイズ
          $path = $request->file('image');
          $img = \Image::make($path);
          $width = 35;
          $height = 35;
          $img->resize($width, $height);
          $img->save($path);

          //保存
          $request->file('image')->store('/public/images');
          $data = ['introduction' => $post['introduction'],
                  'image' => $request->file('image')->hashName()];
          $user->fill($data)->save();

      } else {
          $data = ['introduction' => $post['introduction']];
          $user->fill($data)->save();
      }
      return redirect()->route('home', ['id' => $user->id]);
    }
}
