@extends('layouts.app')

@section('title', $user->name . 'のフォロー中')

@section('content')
  <div class="container">
    <div class="Headline mt-1">
      @if (Auth::id() == $user->id)
      マイページ
      @else
      ユーザーページ
      @endif
    </div>
  </div>
  <div class="container">
    @include('user')
    <ul class="nav nav-tabs nav-justified mt-3">
      <li class="nav-item">
        <a href="" class="nav-link text-muted active">
          フォロー中
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link text-muted">
          フォロワー
        </a>
      </li>
    </ul>
    @foreach($followings as $person)
      @include('person')
    @endforeach
  </div>
@endsection
