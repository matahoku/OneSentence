<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function userDelete (User $user)
    {
      $user->delete();
      return redirect('/');
    }
}
