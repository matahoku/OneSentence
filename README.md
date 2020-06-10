# ワンセンテンス・レビュー
映画等の作品を１文（３０文字程度）でレビューするSNSアプリです。<br>
レビュー投稿から、ユーザーフォロー、いいねなど一般的なSNS要素を実装しています。<br>

## デモ
![demo](https://raw.github.com/wiki/matahoku/OneSentence/images/one.gif)

## 概要
以前にポートフォリオとして、自分だけが閲覧できる映画レビューサイト 『 Myシネマレビュー 』 を開発しました。<br>
以前のMyシネマレビューでは、詳細なレビューを書くことに主軸を起き、画像等の著作権保護の観点からも自分一人で楽しむ自己完結なアプリでした。<br>
一方、こちらのアプリ『 ワンセンテンスレビュー 』では、SNS要素を強化したライトなレビューを投稿するサービスとして開発しています。<br>
技術面では、以前のMyシネマレビューはLaravelのみでしたが、今回のワンセンテスレビューはLaravel + Vue.jsで作成しています。<br>

## 構成
言語・フレームワーク　<br>
PHP 7.4.2 <br>
Laravel 6.18.16 <br>
JavaScript ES6 <br>
Vue.js 2.6.11 <br>
HTML&CSS  <br>
Bootstrap <br>

データベース<br>
Mysql 5.7 <br>

開発環境 <br>
docker(Laradock) <br>

インフラ <br>
heroku <br>

ライブラリ　<br>
starability.css　https://github.com/LunarLogic/starability （星評価） <br>
Intervention Image (画像編集）　<br>
VueTagsInput (タグ） <br>

## 実装機能
ログイン/会員登録機能/パスワードリセット 　<br>
ユーザー情報編集 （サムネイル画像設定等） <br>
レビュー投稿機能 (投稿・編集・削除) <br>
レビュー検索機能 （タイトル検索） <br>
お問い合わせフォーム （投稿内容はGメール受信） <br>
いいね機能 (Vue.js) <br>
フォロー機能 （Vue.js） <br>
タグ登録機能 （Vue.js) <br>

## リリース
ワンセンテンス・レビューへのリンク　https://one-sentence-review.herokuapp.com  <br>
会員ページ体験用仮ログイン アドレス： dummyuser@aaa  パス： dummyuser　<br>

※本番環境での本格的な運用は考えていません。その為、 <br> 
無料小容量DBの使用(clearMysql)。 <br>
クラウドストレージ等未使用な為、画像保存及びサムネイル表示は不可となっています。




