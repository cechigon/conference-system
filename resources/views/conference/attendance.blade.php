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
                <h1 class="title">出席確認</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <article class="box">
                        <p>タイトル : {{ $attendance->conference_name }}</p>
                        <p>クラス : {{ $attendance->class_number }}</p>
                        <p>締め切り : {{ date('Y/m/d H:i:s', strtotime($attendance->deadline)) }}</p>
                        <p>日時 : {{ date('Y/m/d', strtotime($attendance->date)) }}</p>
                        <p>開始 : {{ date('H:i:s', strtotime($attendance->start_time)) }}</p>
                        <p>終了 : {{ date('H:i:s', strtotime($attendance->end_time)) }}</p>
                        <p>場所 : {{ $attendance->location }}</p>
                        <p>備考 : {{ $attendance->note }}</p>
                        </br>

                        <div class="modal-footer">
                            <form id="form" method="POST" action="{{ route('conference.attendanced') }}"
                                class="form-inline">
                                @csrf
                                <div>
                                    <input type="hidden" name="conference_id" value="{{ $attendance->id }}">
                                </div>
                                <input type="submit" class="btn btn-primary" value="出席">
                            </form>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
