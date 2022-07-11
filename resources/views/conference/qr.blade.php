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
                <h1 class="title">保護者会</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <article class="box">
                        <h1>タイトル : {{ $conference->conference_name }}</h1>
                        <p>ID : {{ $conference->id }}</p>
                        <p>クラス : {{ $conference->class_number }}</p>
                        <p>締め切り : {{ date('Y/m/d H:i:s', strtotime($conference->deadline)) }}</p>
                        <p>日時 : {{ date('Y/m/d', strtotime($conference->date)) }}</p>
                        <p>開始 : {{ date('H:i:s', strtotime($conference->start_time)) }}</p>
                        <p>終了 : {{ date('H:i:s', strtotime($conference->end_time)) }}</p>
                        <p>設定者 : {{ $conference->author }}</p>
                        <p>場所 : {{ $conference->location }}</p>
                        <p>備考 : {{ $conference->note }}</p>
                        <p>作成日 : {{ date('Y/m/d H:i:s', strtotime($conference->created_at)) }}</p>
                        <p>更新⽇ : {{ date('Y/m/d H:i:s', strtotime($conference->updated_at)) }}</p>
                        <p><a href="{{ route('conference.entry', ['id' => $conference->id]) }}">出欠確認</a></p>
                        <p>{!! QrCode::size(300)->generate('http://localhost:8000/conference/attendance/' . $conference->attendances_url) !!}</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
