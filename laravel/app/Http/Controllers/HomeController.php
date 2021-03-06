<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sentence;
use App\User;
use App\Tag;
use App\Http\Requests\SentenceRequest;

class HomeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->authorizeResource(Sentence::class, 'sentence');
    }

    public function index(int $id)
    {
      $user = User::where('id',$id)->first();
      $sentences = $user->sentences->sortByDesc('created_at');
      return view('home', ['user' => $user, 'sentences' => $sentences]);
    }

    public function create()
    {
      $allTagNames = Tag::all()->map(function ($tag) {
          return ['text' => $tag->name];
      });

       return view('create',['allTagNames' => $allTagNames]);
    }

    public function store(SentenceRequest $request, Sentence $sentence)
    {

       $sentence->fill($request->all());
       $sentence->user_id = $request->user()->id;
       $sentence->save();

       $request->tags->each(function ($tagName) use ($sentence) {
         $tag = Tag::firstOrCreate(['name' => $tagName]);
         $sentence->tags()->attach($tag);
       });

       return redirect('/');
    }

    public function edit(Sentence $sentence)
    {
        $tagsNames = $sentence->tags->map(function($tag) {
            return ['text' => $tag->name] ;
        });

        $allTagNames = Tag::all()->map(function($tag){
            return ['text' => $tag->name];
        });

        return view('edit', ['sentence'=> $sentence, 'tagNames' => $tagsNames,
                             'allTagNames' => $allTagNames]);
    }

    public function update(SentenceRequest $request, Sentence $sentence)
    {
        $sentence->fill($request->all())->save();

        $sentence->tags()->detach();
        $request->tags->each(function($tagName) use ($sentence) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $sentence->tags()->attach($tag);
        });

        return redirect()->route('home',['id' => $sentence->user->id]);
    }

    public function delete(Sentence $sentence)
    {
        $sentence->delete();
        return redirect()->route('home',['id' => $sentence->user->id]);
    }

    public function like(Request $request, Sentence $sentence)
    {
        $sentence->likes()->detach($request->user()->id);
        $sentence->likes()->attach($request->user()->id);

        return [
          'id' => $sentence->id,
          'countLikes' => $sentence->count_likes,
        ];
    }

    public function unlike(Request $request, Sentence $sentence)
    {
        $sentence->likes()->detach($request->user()->id);

        return [
          'id' => $sentence->id,
          'countLikes' => $sentence->count_likes,
        ];
    }

    public function follow(Request $request, String $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, String $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

}
