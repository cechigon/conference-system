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
                <h1 class="title">保護者会設定</h1>
            </div>
        </div>
    </header>
    <div class="section">
        <div class="container">
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
        </div>
    </div>
</body>

</html>
