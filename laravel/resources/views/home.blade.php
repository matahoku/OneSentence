@extends('layouts.app')

@section('title', "$user->name"."のページ")

@section('content')
  <div class="container">
    @include('user')
    <ul class="nav nav-tabs nav-justified mt-3">
      <li class="nav-item">
        <a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link text-muted active">
           全ての投稿
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('users.likes', ['id' => $user->id]) }}" class="nav-link text-muted">
          いいね
        </a>
      </li>
    </ul>
    @foreach($sentences as $sentence)
      @include('sentence_card')
    @endforeach
  </div>
@endsection
