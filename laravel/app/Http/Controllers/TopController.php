<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sentence;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index()
    {
        $sentences = Sentence::all()->sortByDesc('created_at');
        return view('index', compact('sentences'));
    }

    public function show(int $id)
    {
      if($id == Auth::id()) {
        return redirect()->route('home',['id' => Auth::id()]);
      } else {
        $user = User::where('id',$id)->first();
        return view('show',compact('user'));
      }
    }

    public function tagShow(string $name){
      $tag = Tag::where('name',$name)->first();
      return view('tagShow', ['tag' => $tag]);
    }
}
