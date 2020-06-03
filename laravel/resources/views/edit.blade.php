@extends('layouts.app')

@section('title','記事更新')

@section('content')
  <div class=" container">
    <div class="col-md-0">
      <h1>レビュー編集ページ</h1>
      <form action="{{ route('update', ['sentence' => $sentence]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="card">
          <div class="card-body">

            @include('error_show')

            <div class="form-group">
              <label>タイトル</label>
              <input class="form-control" type="text" name="title" value="{{ $sentence->title }}" placeholder="タイトルを入力">
            </div>

            <div class="form-group">
              <sentence-tags-input
              :initial-tags='@json($tagNames ?? [])'
              :autocomplete-items='@json($allTagNames ?? [])'
              >
              </sentence-tags-Input>
            </div>

            <div class="form-group">
              <label>短い感想</label>
              <input class="form-control" type="text" name="body" value="{{ $sentence->body }}" placeholder="20文字以内で入力">
            </div>

            <fieldset class="starability-slot">
              <legend style="margin-bottom:0;">総合評価</legend>
                <input checked="checked" @if($sentence->rating == 1) checked="checked" @endif type="radio" id="first-rate1" name="rating" value="1" />
                <label for="first-rate1" title="Terrible">1 stars</label>

                <input @if($sentence->rating == 2) checked="checked" @endif type="radio" id="first-rate2" name="rating" value="2" />
                <label for="first-rate2" title="Not good">2 stars</label>

                <input @if($sentence->rating == 3) checked="checked" @endif type="radio" id="first-rate3" name="rating" value="3" />
                <label for="first-rate3" title="Average">3 stars</label>

                <input @if($sentence->rating == 4) checked="checked" @endif type="radio" id="first-rate4" name="rating" value="4" />
                <label for="first-rate4" title="Very good">4 stars</label>

                <input @if($sentence->rating == 5) checked="checked" @endif type="radio" id="first-rate5" name="rating" value="5" />
                <label for="first-rate5" title="Amazing">5 stars</label>
            </fieldset>


            <input type="submit" class="btn btn-primary" value="更新">
            <input type="button" class="btn btn-primary" onclick="history.back()" value="編集をやめる">

          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
