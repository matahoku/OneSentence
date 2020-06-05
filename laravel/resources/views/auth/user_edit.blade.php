@extends('layouts.app')

@section('title', 'ユーザー情報編集')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">ユーザー情報編集</div>
          <div class="card-body">
            <form action="{{ route('user.update', ['user' => $user]) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              @include('error_show')
              <div class="form-group">
                <label>自己紹介文</label>
                <input type="text" name="introduction" value="{{ $user->introduction }}" class="form-control">
              </div>
              <div class="form-gropu">
                <label>サムネイル画像</label>
                <input type="file" name="image" class="form-control-file">
              </div>
              <div class="form-group pt-2 mb-0">
                初期画像に戻す  <input type="checkbox" name="noImage" value="true">
              </div>
              <div class="form-group pt-3 mb-0">
                <input type="submit" class="btn btn-primary mr-1" value="更新">
                <input type="button" class="btn btn-primary ml-0" onclick="history.back()" value="編集をやめる">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
