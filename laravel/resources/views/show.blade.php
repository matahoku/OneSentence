@extends('layouts.app')

@section('title', "$user->name"."のページ")

@section('content')
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex flex-row">
          <a href="#" class="text-dark">
            <i class="fas fa-user-circle fa-3x"></i>
          </a>
        </div>
        <h2 class="h5 card-title m-0">
          <a href="" class="text-dark">{{ $user->name }}</a>
        </h2>
      </div>
    </div>
  </div>
@endsection
