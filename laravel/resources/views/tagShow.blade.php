@extends('layouts.app')

@section('title', $tag->hashtag)

@section('content')
    <div class="container">
      <h3 class="Headline mt-1 mb-0 text-center">
        『 {{ $tag->hashtag }} 』の記事一覧
      </h3>
      <div class="text-right">
        <small>ヒット数：{{ $tag->sentences->count() }}件</small>
      </div>
    </div>
    @foreach($tag->sentences as $sentence)
      @include('sentence_card')
    @endforeach
  </div>
@endsection
