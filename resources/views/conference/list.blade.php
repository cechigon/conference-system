<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/side.css') }}">
    <script src="{{ asset('js/openclose.js') }}"></script>
    <script src="{{ asset('js/fixmenu.js') }}"></script>
    <script src="{{ asset('js/fixmenu_pagetop.js') }}"></script>
    <script src="{{ asset('js/ddmenu_min.js') }}"></script>
</head>

<body>
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


                <!--保護者会の通知部分-->
                <section>

                    <h2>保護者会<span>Conference</span></h2>

                    @foreach ($conferences as $conference)
                        <div class="list">
                            <div class="text">
                                <h3>{{ $conference->conference_name }}</h3>
                                <ul class="disc">
                                    <li><strong>日時</strong> </li>
                                    <span>{{ date('Y年m月d日', strtotime($conference->date)) . date(' H:i', strtotime($conference->start_time)) . '~' . date('H:i', strtotime($conference->end_time)) }}</span>
                                    <br>
                                    <li><strong>場所</strong></li>
                                    <span>{{ $conference->location }}</span>
                                    <br>
                                    <li><strong>備考</strong></li>
                                    <span>{{ $conference->note }}</span>
                                    <li><strong>参加申し込み</strong></li>
                                    <a href="{{ route('conference.entry', ['id' => $conference->id]) }}">参加登録</a>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </section>

                <!--当日の流れの説明部分-->
                <section>

                    <h2>連絡事項<span>information</span></h2>

                    <h3>保護者会参加について</h3>
                    <p>保護者参加申し込みページより出欠情報の入力をお願いします<br>
                        <span>※不参加の場合も参加登録ページへ入力をお願いします</span>
                    </p>

                    <h3>当日の出席確認について</h3>
                    <p>
                        当日は保護者様自身で<strong class="color1">教室に掲示しているQRコード</strong>を読み込んでいただき、そのページにて出席ボタンを押下することで出席とします。
                    </p>
                </section>


            </div>
            <!--/.inner-->

        </div>
        <!--/#contents-->

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log out') }}
            </x-dropdown-link>
        </form>

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
