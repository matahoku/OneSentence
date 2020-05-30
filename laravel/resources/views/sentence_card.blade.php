<div class="container">
    <div class="card mt-3">
      <div class="card-body d-flex flex-row">
        <i class="fas fa-user-circle fa-3x mr-1"></i>
        <div>
          <div class="font-weight-bold">
            {{ $sentence->user->name }}
          </div>
          <div class="font-weight-lighter">
            {{ $sentence->created_at->format('Y/m/d H:i') }}
          </div>
        </div>
      </div>
      <div class="card-body row pt-0 pb-2">
        <div class="card-title h5" style=padding-right:30px>
          {{ $sentence->title }}
        </div>
        <div class="card-text">
          {{ $sentence->body }}
        </div>
      </div>
      <div class="card-body row pt-0 pb-1">
        <h3 id="rated-element" class="mr-2 mt-1" >総合評価</h3>
        <div class="starability-result " data-rating="{{ $sentence->rating }}" aria-description="rated-element"></div>
      </div>
    </div>
  </div>
