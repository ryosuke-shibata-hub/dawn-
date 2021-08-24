@extends('layouts.login')



  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/login.style.css') }}">
<body>



<script>
  window.onload = function () {
  $('#update').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
    var recipient = button.data('whatever') //data-whatever の値を取得

    //Ajaxの処理はここに

    var modal = $(this)  //モーダルを取得
    // modal.find('.modal-title').text('New message to ' + recipient) //モーダルのタイトルに値を表示
    modal.find('.updateModal input#recipient-name').val(recipient) //inputタグにも表示
  })
}
</script>

  @section('content')

<div class="tweet">
  <img class="my-profile"src="public/uploads.img/{{ $auth->images}}">

  @if ($errors->any())
        <div>
            <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li style="color: red; font-size: 14px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


  {!! Form::open(['url' => '/top']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'input', 'placeholder' => '何をつぶやこうかな...？']) !!}
        </div>
        <input  type='image' id="tweet" name="submit" src="images/post.png">
        {!! Form::close() !!}


</div>

{!! Form::open(['url' => '/update', 'method' => 'get']) !!}

  <div class="modal fade" id="update" tabindex="-1"
      role="dialog" aria-labelledby="label1" aria-hidden="true">
  <div class="modal-dialog-centered" role="document">

  <div class="updateModal">
      <form>
        <!-- {!! Form::input('text', 'newPost', null, ['required', 'class' => 'input', 'id'=>'recipient-name']) !!} -->
            <input type='text'  id="recipient-name" name="updatePost">
            <input type='hidden'  id="user-name" name="updateId">
            <input  type='image' id="img" name="submit" src="images/edit.png">
      </form>
</div>
  </div>
</div>


{!! Form::close() !!}

@foreach ($list as $list)
<div class="form">
<tr>
  <td>
    <img class="user-img" src="public/uploads.img/{{ $list->images }}"></td>
  <div class="username">
    <td> {{ $list->username }}</td>
  </div>
  <div class="text">
    <td>{{ $list->posts }}</td>
  </div>
  <div class="create-at">
    <td>{{ $list->updated_at }}</td>
  </div>
  <div class="edit">

  <td>

    @if(Auth::user()->id === $list->user_id)
	  @method('delete')
    <a class="btn-delete" href="{{$list->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><span><img src="images/trash_h.png"></span><span><img src="/images/trash.png"></span></a>
    @endif
  </td>

  <td>

    @if(Auth::user()->id === $list->user_id)

    <a type="button" class="btn-update" href="{{$list->id}}/update" data-target="#update" data-toggle="modal" data-whatever="{{$list->posts}}" data-user="{{$list->id}}" data-backdrop="true">
    <img src="images/edit.png"></a>

    @endif
  </td>

  </div>
</tr>
</div>
@endforeach

@endsection



</body>
