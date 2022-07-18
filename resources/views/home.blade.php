<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/side.css') }}">
    <script src="{{ asset('js/openclose.js') }}"></script>
    <script src="{{ asset('js/fixmenu.js') }}"></script>
    <script src="{{ asset('js/fixmenu_pagetop.js') }}"></script>
    <script src="{{ asset('js/ddmenu_min.js') }}"></script>
</head>

<body class="home">

    <div id="container">

        <!--PC用（801px以上端末）メニュー-->
        <nav id="menubar" class="nav-fix-pos">
            <ul class="inner">
                <li><a href="{{ route('home') }}">ホーム<span>home</span></a></li>
                <li><a href="{{ route('conference.list') }}">保護者会<span>conference</span></a></li>
                <li><a href="{{ route('personal') }}">個人面談<span>interview</span></a>
            </ul>
        </nav>

        <!--小さな端末用（800px以下端末）メニュー-->
        <nav id="menubar-s">
            <ul>
                <li><a href="{{ route('home') }}">ホーム<span>home</span></a></li>
                <li><a href="{{ route('conference.list') }}">保護者会<span>conference</span></a></li>
                <li><a href="{{ route('personal') }}">個人面談<span>interview</span></a>
            </ul>
        </nav>

        <div id="contents">

            <div class="inner">

                <section id="new">

                    <h2>お知らせ<span>News</span></h2>
                    <dl>
                        <dt>2022/07/11</dt>
                        <dd>保護者会の開催が決定しました。</dd>
                        <dt>20XX/00/00</dt>
                        <dd>希望者向けに、保護者会後に個別面談を行います。</dd>
                        <dt>20XX/00/00</dt>
                        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。<span class="newicon">NEW</span></dd>
                        <p class="r">&raquo;&nbsp;<a href="#">過去ログ</a></p>

                </section>
                <!--/#new-->

                <section>

                    <h2>サイトの説明<span>site map</span></h2>

                    <h3>このサイトでできること</h3>
                    <p>
                        ああああ
                    </p>

                    <h3>使い方</h3>
                    <p>

                    </p>

                    <h3>ご質問</h3>
                    <p><a href="about.html">こちらをご覧下さい。</a></p>

                </section>

            </div>
            <!--/.inner-->

        </div>
        <!--/#contents-->

    </div>
    <!--/#container-->

    <p class="nav-fix-pos-pagetop"><a href="#">↑</a></p>

    <!--メニュー開閉ボタン-->
    <div id="menubar_hdr" class="close"></div>

    <!--メニューの開閉処理-->
    <script>
        open_close("menubar_hdr", "menubar-s");
    </script>

    <!--「WORKS」の子メニュー-->
    <script>
        open_close("menubar_hdr2", "menubar-s2");
    </script>

</body>

</html>
