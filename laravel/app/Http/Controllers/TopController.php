<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopController extends Controller
{
    public function index()
    {
      return view('index');
    }
}
