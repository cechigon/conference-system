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
                <li><a href="{{ route('personal') }}">個人面談<span>interview</span></a></li>
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

                <section>

                    <h2>個別面談<span>interview</span></h2>

                    <div class="list">
                        <div class="text">
                            <h3>○月○日 個別面談のご案内</h3>
                            <ul class="disc">
                                <li><strong>日時</strong> </li>
                                <span>○月○日 15:00~ 20分刻み</span>
                                <br>
                                <li><strong>場所</strong></li>
                                <span>産技高専品川　6階 5400教室</span>
                                <br>
                                <li><strong>参加予約</strong></li>
                                個人面談の参加については保護者会当日の出欠ページにて確認します
                            </ul>
                        </div>
                    </div>

                </section>

                <div class="list">
                    <div class="text">
                        <h4>メニュータイトル</h4>
                        <p>ここに説明を入れます。サンプルテキスト。ここに説明を入れます。サンプルテキスト。ここに説明を入れます。サンプルテキスト。ここに説明を入れます。サンプルテキスト。</p>
                        <p class="btn1"><a href="#">もっとみる</a></p>
                    </div>
                    <figure><img src="images/sample2.jpg" alt=""></figure>
                </div>

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
