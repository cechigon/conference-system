<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>保護者会設定</title>
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

                <section>

                    <h2>保護者会設定</h2>
                    <h3>保護者会の設定を行ってください</h3>

                    <form method="POST" action="{{ route('conference.created') }}">
                        @csrf
                        <div class="form-group">
                            <label>保護者会名</label>
                            <input type="text" class="form-control" name="conference_name" required>
                        </div>

                        <div class="form-group">
                            <label>クラス</label>
                            <input type="text" class="form-control" name="class_number" required>
                        </div>

                        <div class="form-group">
                            <label>締め切り</label>
                            <input type="datetime-local" name="deadline">
                        </div>

                        <div class="form-group">
                            <label>年月日</label>
                            <input type="date" name="date">
                        </div>

                        <div class="form-group">
                            <label>開始時間</label>
                            <input type="time" name="start_time">
                        </div>

                        <div class="form-group">
                            <label>終了時間</label>
                            <input type="time" name="end_time">
                        </div>

                        <div class="form-group">
                            <label>場所</label>
                            <input type="text" name="location">
                        </div>

                        <div class="form-group">
                            <label>備考</label>
                            <input type="text" name="note">
                        </div>

                        <input type="submit" class="btn btn-primary" value="作成">
                    </form>

                </section>

            </div>

        </div>
    </div>

</body>

</html>
