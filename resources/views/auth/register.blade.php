@extends('layouts.logout')




@section('content')




{!! Form::open() !!}

@csrf

<div class="main">
<h2>新規ユーザー登録</h2>


{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input','placeholder'=>'UserName']) }}

{{ Form::label('MailAddress') }}
{{ Form::text('mail',null,['class' => 'input','placeholder'=>'MailAddress']) }}

{{ Form::label('Password') }}
{{ Form::password('password',null,['class' => 'input','placeholder'=>'Password']) }}

{{ Form::label('password_confirmed') }}
{{ Form::password('password_confirmed',null,['class' => 'input','placeholder'=>'password_confirmed']) }}

 @if ($errors->any())
        <div>
            <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li style="color: red; font-size: 14px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{ Form::submit('Register') }}


<p><a href="/login" name="action" value="back">ログイン画面へ戻る</a></p>

</div>
@push('register')
<link  href="{{ asset('css/register.css') }}" rel="stylesheet">
@endpush
{!! Form::close() !!}

@endsection
