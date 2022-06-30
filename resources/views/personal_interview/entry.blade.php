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
                <h1 class="title">個別面談 - 申込み</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <article class="box">
                        <p>ID : {{ $interview->id }}</p>
                        <p>保護者会ID : {{ $interview->conferences_id }}</p>
                        <p>開始時間 : {{ date('H:i:s', strtotime($interview->start)) }}</p>
                        <p>場所 : {{ $interview->location }}</p>
                        <p>所要時間 : {{ $interview->minutes }}</p>
                        <p>設定者 : {{ $interview->author }}</p>

                        </br>

                        <div class="modal-footer">
                            <form id="form" method="POST"
                                action="{{ route('personal_interview.registration') }}" class="form-inline">
                                @csrf
                                <div class="form-group mx-sm-3">
                                    <div>
                                        <input type="hidden" name="personal_interviews_id"
                                            value="{{ $interview->id }}">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="申込み">
                                </div>
                            </form>
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
