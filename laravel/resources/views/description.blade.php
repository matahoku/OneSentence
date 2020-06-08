@extends('layouts.app')

@section('title', 'ワンセンテンス・レビューについて')

@section('content')
  <div class="container mt-4">
    <h1 class="TopHeadline">ワンセンテンス・レビューとは</h1>

    <h3 class="Headline">ワンセンテンス・レビューとは</h3>
    <p class="pt-2">
      映画やドラマ、アニメ等の感想を一文(30文字以内)で投稿するソーシャル・ネットワーキング・サービスです。<br>
      ログインユーザーは無料でレビューを投稿することができます。<br>
      また、他のユーザーをフォローしたり、いいねしたりすることができます。
    </p>

    <h3 class="Headline">注意</h3>
    <p class="pt-2">
      他ユーザーのレビューにはネタバレが含まれている可能性があります。<br>
      閲覧は自己責任でお願いします。<br>
      不適切な投稿(サイトの主旨と大きく離れている等)を発見した際は、投稿を削除しますのでご容赦下さい。<br>
        ワンセンテンス・レビューはPCでの利用を想定して作成しています。スマートフォンでのご利用はレイアウト崩れ等
    が発生する可能性があります。ご了承下さい。
    </p>

    <h3 class="Headline">使用素材</h3>
    <div>ロゴは <a href="https://www.designevo.com/jp/logo-maker/" title="無料オンラインロゴメーカー">DesignEvo</a> 様のロゴメーカーを利用</div>

    <h3 class="Headline">管理人</h3>
    <p class="pt-2">
      こんにちは！<br>
      管理人のmatamuraです。<br>
      このサイトを作成する数ヶ月前、自分だけが閲覧できる映画レビューサイト『 Myシネマレビュー 』をリリースしました。<br>
      前回は自分完結のアプリケーションでしたので、今回のサイトではレビュー投稿という点では同一ですが
      SNS要素を強化したレビューサイトを作成しました。<br>
      現状、シンプル イズ ベストな構成になっていますが、今後良いアイデアが浮かんだら拡張していくかもしれません...。<br>
      <a href="http://my-cinema-review.com">『Myシネマレビュー』へのリンク</a>
    </p>

    <h3 class="Headline">お問い合わせ</h3>
    <p class="pt-2">
      ご意見・ご要望などがございましたら、お気軽にお問い合わせください。<br>
      ※お返事にはお時間をいただく場合がございます。予めご了承いただきますようお願いいたします。<br>
      ※メールアドレスは間違いのないようご記入下さい。間違っていた場合は回答することが困難になります。
    </p>
      <form action="{{ route('contact') }}" method="post">
        @csrf
        <div class="card" id='contact'>
          <div class="card-body p-4">
            @include('error_show')
            @if (session('flash_message'))
            <div class="flash_message alert alert-success text-center py-3 my-0 mb30">
              {{ session('flash_message') }}
            </div>
            @endif
            <div class="form-group">
              <label>お名前</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
              <label>メールアドレス</label>
              <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
              <label>お問い合わせ内容</label>
              <textarea name="body" rows="8" cols="80" class="form-control" value="{{ old('body') }}"></textarea>
            </div>
            <div class="form-group mb-0">
              <label>内容をご確認のうえ送信ボタンをクリックしてください</label>
              <button type="submit" class="btn btn-block btn-primary">
                送信
              </button>
            </div>
          </div>
        </div>
      </form>
  </div>
@endsection
