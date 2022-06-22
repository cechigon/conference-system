<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<body>
    <header class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">出欠確認</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <article class="box">
                        <p>タイトル : {{ $conference->conference_name }}</p>
                        <p>クラス : {{ $conference->class_number }}</p>
                        <p>締め切り : {{ date('Y/m/d H:i:s', strtotime($conference->deadline)) }}</p>
                        <p>開始 : {{ date('H:i:s', strtotime($conference->start_time)) }}</p>
                        <p>終了 : {{ date('H:i:s', strtotime($conference->end_time)) }}</p>
                        <p>場所 : {{ $conference->location }}</p>
                        <p>備考 : {{ $conference->note }}</p>
                        </br>
                        <p>- 出欠</p>
                        <div>
                            <label><input type="radio" name="radio" class="radio" value="チェック１">出席</label>
                            <label><input type="radio" name="radio" class="radio" value="チェック2">欠席</label>
                        </div>
                        <p>- 出席者</p>
                        <div>
                            <p><label><input type="checkbox" name="browser" value="father">父</label></p>
                            <p><label><input type="checkbox" name="browser" value="mather">母</label></p>
                            <p><label><input type="checkbox" name="browser" value="other">その他</label></p>
                        </div>
                        </br>
                        <a href="#" onclick="history.back(-1);return false;">戻る</a>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
