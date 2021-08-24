@extends('layouts.logout')

@section('content')


{!! Form::open() !!}
<div class="clear">
  <div class="name">
<p>{{ session('username') }}さん、</p>
</div>
<div class="welcome">
  <p>ようこそ！DAWNSNSへ！</p>
</div>

<div class="text">
  <p>ユーザー登録が完了しました。</p>
  </div>
  <div class="text1">
  <p>さっそく、ログインをしてみましょう</p>
</div>



<p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

{!! Form::close() !!}
@push('added')
<link href="{{ asset('css/added.css')}}" rel="stylesheet">
@endpush
@endsection
