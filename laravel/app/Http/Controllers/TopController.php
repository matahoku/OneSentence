<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sentence;



class TopController extends Controller
{
    public function index()
    {
      return view('index');
    }
}
