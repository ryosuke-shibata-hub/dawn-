$(function () {
  $('.drop-dawn').click(function () {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.menu-list').addClass('active');
      $('.menu-style').addClass('active');
    } else {
      $('.menu-list').removeClass('active');
      $('.menu-style').removeClass('active');
    }
  });
  $('.menu-list ul li a').click(function () {
    $('.drop-dawn').removeClass('active');
    $('.menu-list').removeClass('active');
    $('.menu-style').removeClass('active');
  });
});

window.onload = function () {
  $('#update').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
    var recipient = button.data('whatever') //data-whatever の値を取得
    var recipient1 = button.data('user')
    //Ajaxの処理はここに

    var modal = $(this)  //モーダルを取得
    // modal.find('.modal-title').text('New message to ' + recipient) //モーダルのタイトルに値を表示
    modal.find('.updateModal input#recipient-name').val(recipient) //inputタグにも表示
    modal.find('.updateModal input#user-name').val(recipient1)
  })
}

// モーダルウィンドウ
// $(function () {
//   $('.btn-update').on('click', function () {
//     $('.update-confirm').fadeIn();
//     return false;
//   });
//   $('.close-modal').on('click', function () {
//     $('.update-confirm').fadeOut();
//     return false;
//   });


// });




// window.onload = function () {
//   $('#update').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget)
//     var recipient = button.data('whatever')

//     var modal = $(this);

//     modal.find('.modal-title').text('new' + recipient)
//     modal.find('.update-confirm text#recipient-name').val(recipient)
//   })
// }


// window.onload = function () {
//   $('#update').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
//     var recipient = button.data('id') //data-whatever の値を取得

//     //Ajaxの処理はここに

//     var modal = $(this)  //モーダルを取得
//     // modal.find('.modal-title').text('New message to ' + recipient) //モーダルのタイトルに値を表示
//     modal.find('.updateModal input#recipient-name').val(recipient) //inputタグにも表示
//   })
// }


// window.onload = function () {
//   $('#exampleModal').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
//     var recipient = button.data('whatever') //data-whatever の値を取得

//     //Ajaxの処理はここに

//     var modal = $(this)  //モーダルを取得
//     modal.find('.modal-title').text('New message to ' + recipient) //モーダルのタイトルに値を表示
//     modal.find('.modal-body input#recipient-name').val(recipient) //inputタグにも表示
//   })
// }
