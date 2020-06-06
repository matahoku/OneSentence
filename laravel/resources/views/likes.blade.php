@extends('layouts.app')

@section('title', $user->name . 'のいいねした記事')

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
        <a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link text-muted">
          全てのセンテンス
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('users.likes', ['id' => $user->id]) }}" class="nav-link text-muted active">
          いいね
        </a>
      </li>
    </ul>
    @foreach($sentences as $sentence)
      @include('sentence_card')
    @endforeach
  </div>
@endsection
