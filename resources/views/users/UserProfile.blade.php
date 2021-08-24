@extends('layouts.login')

<link rel="stylesheet" href="{{asset('css/user_list.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">






  @section('content')




  <div class="profile">


    <img class="my_icon"src="{{asset('public/uploads.img/'.$user_id->images)}}">
    <div class="name">

    {!! Form::open() !!}

    <p>UserName</p>
      {!! Form::input('text','my-name', null, ['class'=>'input', 'placeholder'=> "$user_id->username",'readonly']) !!}
      <p>bio</p>
      {!! Form::input('text','my-bio', null, ['required','class'=>'input', 'placeholder'=> "$user_id->bio",'readonly']) !!}
    </div>
  </div>
  {!! Form::close() !!}

<div class="follow_button">
  @if (auth()->user()->isFollowing($user_id->id))
    <form action="{{ route('unfollow',['id'=>$user_id->id]) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
        <button type="submit" class="btn btn_unfollow">フォローを外す</button>
    </form>

  @else

    <form action="{{ route('follow',['id' => $user_id->id]) }}" method="post">
      {{ csrf_field() }}
      <button type="submit" class="btn btn_follow">フォローする</button>
    </form>
  @endif

</div>




  @foreach($user_profile as $list_follow)
  <div class="user_posts">
    <td>
    <div class="user_data">
    <img class="user-img" src="{{asset('public/uploads.img/'.$user_id->images)}}">
    </div>
    </td>
    <div class="username">
    <div class="user_data">
      <td>{{ $list_follow->username }}</td>
      </div>
    </div>
    <div class="posts">
    <div class="user_data">
      <td>{{ $list_follow->posts }}</td>
      </div>
    </div>
    <div class="created_at">
    <div class="user_data">
      <td>{{ $list_follow->created_at }}</td>
      </div>
    </div>
    </div>
     @endforeach


@endsection
