@extends('layouts.login')

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/tweetSearch.css') }}">

  <title>Document</title>
</head>
<body>
</body>
</html>

@section('content')

{!! Form::open(['url' => '/searchTweet' ,'method' => 'get']) !!}

<div class="user_search">

        <div class="form-search">
            {!! Form::input('text', 'search_users', null, ['required', 'class' => 'input', 'placeholder' => 'つぶやきを探す']) !!}
        </div>
        <input type="image" name="submit" src="/images/seach.jpg">

        <p>
          検索ワード : {{ $name }}
        </p>


</div>
{!! Form::close() !!}

@foreach ($search_users as $user)

<div class="search_list">
<img class="user-img" src="public/uploads.img/{{ $user->images }}">
  <tr>
    <div class="username">
      <td> {{ $user->posts }}:</td><br>
      <td> {{ $user->username }}</td>
    </div>
  </tr>
</div>
<div class="follow_button">
  @if (auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow',['id'=>$user->id]) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
        <button type="submit" class="btn btn_unfollow">フォローを外す</button>
    </form>

  @else

    <form action="{{ route('follow',['id' => $user->id]) }}" method="post">
      {{ csrf_field() }}
      <button type="submit" class="btn btn_follow">フォローする</button>
    </form>
  @endif

</div>
@endforeach


@endsection
