@extends('layouts.app')

@section('title', $search)

@section('content')
    <div class="container">
      <h3 class="Headline mt-1 mb-0 text-center">
        『 {{ $search }}  』の検索結果
      </h3>
      <div class="text-right">
        <small>ヒット数：{{ $searchResults->count() }}件</small>
      </div>
    </div>
    @foreach($searchResults as $sentence)
      @include('sentence_card')
    @endforeach
  </div>
@endsection
