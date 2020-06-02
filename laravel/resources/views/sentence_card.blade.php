<div class="container">
    <div class="card mt-3">
      <div class="card-body d-flex flex-row">
        <a href="{{ route('show', ['id' => $sentence->user->id]) }}" class="text-dark">
          <i class="fas fa-user-circle fa-3x mr-1"></i>
        </a>
        <div>
          <div class="font-weight-bold">
            <a href="{{ route('show', ['id' => $sentence->user->id]) }}" class="text-dark">
              {{ $sentence->user->name }}
            </a>
          </div>
          <div class="font-weight-lighter">
            {{ $sentence->created_at->format('Y/m/d H:i') }}
          </div>
        </div>

        <!-- ドロップダウン -->
        @if( Auth::id() == $sentence->user_id )
        <div class="ml-auto card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <button type="button" class="btn btn-link text-muted m-0 p-2">
                <i class="fas fa-ellipsis-v"></i>
              </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route("edit", ['sentence' => $sentence]) }}">
                <i class="fas fa-pen mr-1"></i>記事を更新する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $sentence->id }}">
                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
              </a>
            </div>
          </div>
        </div>

          <!-- モーダル -->
          <div id="modal-delete-{{ $sentence->id }}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('delete', ['sentence' => $sentence]) }}">
                  @csrf
                  @method('DELETE')
                  <div class="modal-body">
                    {{ $sentence->title }}を削除します。よろしいですか？
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
      <div class="card-body pt-0 pb-2">
        <div class="card-title h5" style=padding-right:30px>
          {{ $sentence->title }}
        </div>
        <div class="card-text">
          {{ $sentence->body }}
        </div>
      </div>
      <div class="card-body  pt-0 pb-1">
        <h3 id="rated-element" class="mr-2 mt-1" >総合評価</h3>
        <div class="starability-result " data-rating="{{ $sentence->rating }}" aria-description="rated-element"></div>
      </div>
      <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
          <sentence-like
              rticle-like
              :initial-is-liked-by='@json($sentence->isLikedBy(Auth::user()))'
              :initial-count-likes='@json($sentence->count_likes)'
              :authorized='@json(Auth::check())'
              endpoint="{{ route('sentences.like', ['sentence' => $sentence]) }}"
          >
          </sentence-like>
        </div>
      </div>
      @foreach($sentence->tags as $tag)
        @if($loop->first)
          <div class="card-body pt-0 pb-4 pl-3">
            <div class="card-text line-height">
        @endif
          <a href="{{ route('tag', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
            {{ $tag->hashtag }}
          </a>
        @if($loop->last)
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
