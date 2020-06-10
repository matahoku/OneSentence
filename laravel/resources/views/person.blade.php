<div class="container">
<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex flex-row">
      <a href="{{ route('users.show', ['id' => $person->id]) }}" class="text-dark">
        @if ( isset($person->image))
          <img src="{{  asset('storage/images/'. $person->image) }}" class="pb-2" >
        @else
          <i class="fas fa-user-circle fa-3x pb-1 "></i>
        @endif
      </a>
      @if( Auth::id() !== $person->id)
      <follow-button
        class="ml-auto"
        :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
      >
      </follow-button>
      @endif
    </div>
    <div class="card-title d-flex m-0">
      <a href="{{ route('users.show', ['id' => $person->id]) }}" class="text-dark">
        {{ $person->name }}
      </a>
      <div class="card-text pl-3">
        {{ $person->introduction }}
      </div>
    </h2>
  </div>
</div>
</div>
</div>
