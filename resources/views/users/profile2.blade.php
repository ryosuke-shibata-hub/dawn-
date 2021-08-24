
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">




<!--  -->
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1>
            <a href="/top">
                <img src="{{asset('images/main_logo.png')}}">
            </a>
        </h1>
            <div id="g-nav">
                <div id="user">
                    <p>
                        <td> {{ Auth::user()->username}} さん</td>
                    </p>
                        <img src="public/uploads.img/{{ $auth->images }}">
                </div>
                <div class="menu-style">

                <div class="menu-list">

                <ul>
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>

                </div>
                </div>
                <div class="drop-dawn">
                    <span></span>
                    <span></span>
                </div>
            </div>

        </div>

    </header>
    <div id="row">
        <div id="container">

        </div >
        <div id="side-bar">
            <div id="confirm">
                <p> {{ Auth::user()->username }} さんの</p>
                <div class="member">
                <p class="follow">フォロー数</p>


                <p>{{ $follower_count }}名</p>



                </div>
                <p>
                    <button type="submit" ><a href="/follow-list">フォローリスト</a></button>
                </p>
                <div class="member">
                <p class="follow">フォロワー数</p>

                <p>{{ $follow_count }}名</p>

                </div>
                <p>
                    <button type="submit"><a href="/follower-list">フォロワーリスト</a></button>
                    </p>

            </div>

            <p class="btn-search">
                <button type="submit"><a href="/search">ユーザー検索</a></button>
            </p>
            <p class="search-tweet">
                <button type="submit"><a href="/searchTweet">つぶやき検索</a></button>
            </p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/style.js')}}"></script>
    <script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous')}}"></script>
   <!-- Latest compiled and minified JavaScript -->
<script src="{{Asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous')}}"></script>


</body>
</html>
