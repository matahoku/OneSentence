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
        $sentences = $user->sentences->sortByDesc('created_at');
        return view('show', ['user'=> $user, 'sentences'=> $sentences]);
      }
    }

    public function likes(int $id)
    {
      $user = User::where('id', $id)->first();
      $sentences = $user->likes->sortByDesc('created_at');
      return view('likes', ['user'=> $user, 'sentences'=> $sentences]);
    }

    public function followings(int $id)
    {
      $user = User::where('id', $id)->first();
      $followings = $user->followings->sortByDesc('created_at');

      return view('followings', ['user' => $user, 'followings' => $followings]);
    }

    public function followers(int $id)
    {
      $user = User::where('id', $id)->first();
      $followers = $user->followers->sortByDesc('created_at');

      return view('followers', ['user' => $user, 'followers' => $followers]);
    }

    public function tagShow(string $name)
    {
      $tag = Tag::where('name',$name)->first();
      return view('tagShow', ['tag' => $tag]);
    }

    public function description()
    {
      return view('description');
    }

    public function search(Request $request)
    {
      $searchResults = Sentence::where('title', 'like', '%' . $request->search . '%')->orderBy('created_at', 'DESC')->get();
      return view('search', ['search' =>$request->search, 'searchResults' => $searchResults]);
    }
}
