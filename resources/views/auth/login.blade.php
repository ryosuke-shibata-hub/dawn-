@extends('layouts.logout')



@section('content')


{!! Form::open() !!}

<p class="title">Social Network Service</p>

<div class="main">
<p class="welcome">DAWNのSNSへようこそ</p>


{{ Form::label('MailAddress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
{{ Form::submit('LOGIN')}}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

</div>

{!! Form::close() !!}

@endsection
