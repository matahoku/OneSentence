@if ($errors->any())
  <div class="alert alert-danger">
    <h4>入力エラーです。下記の項目を確認して下さい。</h4>
      <ul>
        @foreach($errors->all as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
  </div>
@endif
