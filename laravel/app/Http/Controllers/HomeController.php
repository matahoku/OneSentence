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
      return view('home', compact('user'));
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

        return redirect('/');
    }

    public function delete(Sentence $sentence)
    {
        $sentence->delete();
        return redirect('/');
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


}
