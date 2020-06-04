<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="#" class="text-dark">
        <i class="fas fa-user-circle fa-3x"></i>
      </a>
      @if (Auth::id() !== $user->id )
       <follow-button
         class="ml-auto"
         :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
         :authorized='@json(Auth::check())'
         endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
       >
      </follow-button>
      @else
      <!-- ドロップダウン -->
        <div class="ml-auto card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <button type="button" class="btn btn-link text-muted m-0 p-2">
                <i class="fas fa-ellipsis-v"></i>
              </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('user.edit', ['user' => $user]) }}">
                <i class="fas fa-user-edit mr-1"></i>  ユーザー情報を編集する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
                <i class="fas fa-user-slash mr-1"></i>  ユーザーを削除する
              </a>
            </div>
          </div>
        </div>
        <!-- モーダル -->
        <div id="modal-delete-{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <form method="POST" action="{{ route('user.delete',['user' => $user]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center">
                  ユーザー『 {{ $user->name}} 』を削除します。<br>
                  ユーザー情報・投稿記事が削除がされます。<br>
                  削除手続きを続行しますか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      @endif
    </div>
    <h2 class="h5 card-title m-0">
      <a href="" class="text-dark">{{ $user->name }}</a>
    </h2>
  </div>
  <div class="card-body pt-0 pb-0">
    <div class="card-text">
      {{ $user->introduction }}
    </div>
  </div>
  <div class="card-body">
    <div class="card-text">
      <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="text-muted">
        {{ $user->count_followings }} フォロー
      </a>
      <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="text-muted">
        {{ $user->count_followers }} フォロワー
      </a>
    </div>
  </div>
</div>
