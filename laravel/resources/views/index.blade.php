@extends('layouts.app')

@section('title','記事一覧')

@section('content')
  <div class="container">
    <div class="Headline mt-1">
      全てのレビュー
    </div>
  </div>
  @foreach($sentences as $sentence)
    @include('sentence_card')
  @endforeach
@endsection
