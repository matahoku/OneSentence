@extends('layouts.app')

@section('title','記事一覧')

@section('content')
  @foreach($sentences as $sentence)
    @include('sentence_card')
  @endforeach
@endsection
