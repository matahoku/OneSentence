<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sentence;



class TopController extends Controller
{
    public function index()
    {
      $sentences = Sentence::all()->sortByDesc('created_at');
      return view('index', compact('sentences'));
    }
}
