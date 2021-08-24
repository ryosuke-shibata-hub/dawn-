@extends('layouts.login')


  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">



<body>
  @section('content')

  <div class="profile">
    <img class="myicon"src="public/uploads.img/{{ $auth->images}}">
    <div class="name">





    {!! Form::open(['url'=>'/profile','enctype'=>'multipart/form-data','files' => true,'method'=>'post']) !!}
     @if ($errors->any())
        <div>
            <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li style="color: red; font-size: 14px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::hidden('id',$auth->id) !!}
    <p>UserName</p>
      {!! Form::input('text','username', null, ['class'=>'input', 'placeholder'=> "$auth->username"]) !!}
      <p>MailAddress</p>
      {!! Form::input('text','mail', null, ['class'=>'input', 'placeholder'=> "$auth->mail"]) !!}
      <!-- <p>Password</p>
      <input type="text" name="passHidden" class="input" placeholder="・・・・・・・・・"readonly> -->
      <p>Password</p>
      {!! Form::password('passHidden',['class'=>'input','placeholder'=>"・・・・・・・・・",'readonly',])!!}
      <p>new Password</p>
      {!! Form::input('password','password', null, ['class'=>'input',]) !!}

      <p>bio</p>
      {!! Form::input('text','bio', null, ['class'=>'input', 'placeholder'=> "$auth->bio"]) !!}
      <p>icon image</p>
      <div class=input>
      <label id="imgimg" for="img">
        <text>ファイルを選択</text>
        <input type="file" id="img" class="input" name="file_name">
      </label>

      </div>

      {!! Form::submit('更新',['id'=>'submit']) !!}

      {!! Form::close() !!}







    </div>
  </div>




</body>
</html>





@endsection
