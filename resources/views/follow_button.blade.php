@if(Auth::check())

  @if(Auth::user()->id != $user->id)

    @if(Auth::user()->is_followings($user->id))

    {!! Form::open(['route' =>['unfollow',$user->id],'method'=>'delete'])!!}
      {!! Form::submit('フォローを外す',['class'=> "unfollow_button"])!!}
    {!! Form::close() !!}

    @else

    {!! Form::open(['route'=>['follow',$user->id]]) !!}
      {!! Form::submit('フォローする',['class'=> "follow_button"]) !!}
    {!! Form::close() !!}

    @endif
    @endif
    @endif
