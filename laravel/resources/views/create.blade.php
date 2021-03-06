@extends('layouts.app')

@section('title','レビュー登録')

@section('content')
  <div class="container">
    <h3 class="Headline mt-1 mb-3 p-3 text-center h4">
      レビュー投稿ページ
  </h3>
  </div>
  <div class="container">
    <h3 class="comment h6 text-center mb-2  font-weight-bold">
      作品のタイトル(映画、ドラマ、アニメ等)を記入し、その感想を一文で記入して下さい
  </h3>
  </div>
  <div class="container">
    <div class="col-md-0">
      <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="card">
          <div class="card-body">

            @include('error_show')

            <div class="form-group">
              <label>作品タイトル</label>
              <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="タイトルを入力">
            </div>

            <div class="form-group">
              <sentence-tags-input
              :autocomplete-items='@json($allTagNames ?? [])'
              >
              </sentence-tags-Input>
            </div>

            <div class="form-group">
              <label>感想</label>
              <input class="form-control" type="text" name="body" value="{{ old('body') }}" placeholder="30文字以内で入力">
            </div>

            <fieldset class="starability-slot">
              <legend style="margin-bottom:0;">作品評価</legend>
                <input type="radio" id="first-rate1" name="rating" value="1" />
                <label for="first-rate1" title="Terrible">1 stars</label>

                <input type="radio" id="first-rate2" name="rating" value="2" />
                <label for="first-rate2" title="Not good">2 stars</label>

                <input type="radio" id="first-rate3" name="rating" value="3" />
                <label for="first-rate3" title="Average">3 stars</label>

                <input type="radio" id="first-rate4" name="rating" value="4" />
                <label for="first-rate4" title="Very good">4 stars</label>

                <input type="radio" id="first-rate5" name="rating" value="5" checked="checked"/>
                <label for="first-rate5" title="Amazing">5 stars</label>
            </fieldset>

            <input type="submit" class="btn btn-primary" value="登録">
            <input type="button" class="btn btn-primary" onclick="history.back()" value="編集をやめる">

          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
