<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sentence;
use App\User;

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
       return view('create');
    }

    public function store(Request $request, Sentence $sentence)
    {
       $sentence->fill($request->all());
       $sentence->user_id = $request->user()->id;
       $sentence->save();

       return redirect('/');
    }

    public function edit(Sentence $sentence)
    {
        return view('edit', ['sentence'=> $sentence]);
    }

    public function update(Request $request, Sentence $sentence)
    {
        $sentence->fill($request->all())->save();
        return redirect('/');
    }

    public function delete(Sentence $sentence)
    {
        $sentence->delete();
        return redirect('/');
    }


}
