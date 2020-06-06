@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <h2 class="h4 card-title m-0 text-center">『 {{ $search }}  』の検索結果</h2>
        <div class="card-text text-right">
          {{ $searchResults->count() }}件
        </div>
      </div>
    </div>
    @foreach($searchResults as $sentence)
      @include('sentence_card')
    @endforeach
  </div>
@endsection
