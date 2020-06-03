@extends('layouts.app')

@section('title', $user->name . 'のフォロワー')

@section('content')
<div class="container">
  @include('user')
  <ul class="nav nav-tabs nav-justified mt-3">
    <li class="nav-item">
      <a href="" class="nav-link text-muted ">
        フォロー中
      </a>
    </li>
    <li class="nav-item">
      <a href="{{  }}" class="nav-link text-muted active">
        フォロワー
      </a>
    </li>
  </ul>
  @foreach($followers as $person)
    @include('person')
  @endforeach
</div>
@endsection
