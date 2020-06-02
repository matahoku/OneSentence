@extends('layouts.app')

@section('title', $tag->hashtag)

@section('content')
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
        <div class="card-text text-right">
          {{ $tag->sentences->count() }}件
        </div>
      </div>
    </div>
    @foreach($tag->sentences as $sentence)
      @include('sentence_card')
    @endforeach
  </div>
@endsection
