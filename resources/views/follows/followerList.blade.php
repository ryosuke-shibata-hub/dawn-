@extends('layouts.login')

<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('/css/followlist.css') }}">

<body></body>
@section('content')

<p class="title">Follower List</p>
<div class="img-display">

@foreach($list as $list)

<div class="user-img">

  <a type="button" class="user-img" href="/profile/{{$list->id}}">
    <img class="list-img" src="public/uploads.img/{{ $list->images }}">
  </a>
</div>

@endforeach
</div>
<div class="follow-list">
  @foreach($list_follow as $list_follow)
  <div class="form">
  <td>
    <a href="/profile/{{$list_follow->user_id}}">
    <img class="follow-img" src="public/uploads.img/{{ $list_follow->images }}">
  </a>
  <div class="username">
    <td> {{ $list_follow->username }}</td>
  </div>
  <div class="text">
    <td>{{ $list_follow->posts }}</td>
  </div>
  <div class="create-at">
    <td>{{ $list_follow->updated_at }}</td>
  </div>
  </div>
  @endforeach
</div>
@endsection
</body>
